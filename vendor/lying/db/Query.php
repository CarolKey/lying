<?php
namespace lying\db;

class Query extends QueryBuilder
{
    /**
     * @var Connection 数据库连接实例
     */
    protected $connection;
    
    /**
     * @var array 要查询的字段
     * @see select()
     */
    protected $select = [];
    
    /**
     * @var boolean 是否去重
     * @see distinct()
     */
    protected $distinct = false;
    
    /**
     * @var array 要查询的表
     * @see from()
     */
    protected $from = [];
    
    /**
     * @var array 要关联的表
     * @see join()
     */
    protected $join = [];
    
    /**
     * @var array 查询的条件
     * @see where()
     */
    protected $where = [[], []];

    /**
     * @var array 分组查询的条件
     * @see groupBy()
     */
    protected $groupBy = [];
    
    /**
     * @var array 筛选的条件
     * @see having()
     */
    protected $having = [[], []];
    
    /**
     * @var array 要排序的字段
     * @see orderBy()
     */
    protected $orderBy = [];
    
    /**
     * @var array 偏移和限制的条数
     * @see limit()
     */
    protected $limit = [];
    
    /**
     * @var array 联合查询的Query
     * @see union()
     */
    protected $union = [];
    
    /**
     * 初始化Query查询
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
    
    /**
     * 设置要查询的字段
     * @param string|array $columns 要查询的字段,,当没有设置要查询的字段的时候,默认为'*'
     * e.g. select('id, lying.sex, count(id) as count')
     * e.g. select(['id', 'lying.sex', 'count'=>'count(id)', 'q'=>$query])
     * 其中$query为Query实例,必须指定子查询的别名,只有$columns为数组的时候才支持子查询
     * 注意:当你使用到包含逗号的数据库表达式的时候,你必须使用数组的格式,以避免自动的错误的引号添加
     * e.g. select(["CONCAT(first_name, ' ', last_name) AS full_name", 'email']);
     * @return \lying\db\Query
     */
    public function select($columns)
    {
        if (is_string($columns)) {
            $columns = preg_split('/\s*,\s*/', trim($columns), -1, PREG_SPLIT_NO_EMPTY);
        }
        $this->select = $columns;
        return $this;
    }
    
    /**
     * 去除重复行
     * @return \lying\db\Query
     */
    public function distinct()
    {
        $this->distinct = true;
        return $this;
    }
    
    /**
     * 设置要查询的表
     * @param string|array $tables 要查询的表
     * e.g. from('user, lying.admin as ad')
     * e.g. from(['user', 'ad'=>'lying.admin', 'q'=>$query])
     * 其中$query为Query实例,必须指定子查询的别名,只有$tables为数组的时候才支持子查询
     * @return \lying\db\Query
     */
    public function from($tables)
    {
        if (is_string($tables)) {
            $tables = preg_split('/\s*,\s*/', trim($tables), -1, PREG_SPLIT_NO_EMPTY);
        }
        $this->from = $tables;
        return $this;
    }
    
    /**
     * 设置表连接,可多次调用
     * @param string $type 连接类型,可以为'left join', 'right join', 'inner join'
     * @param string|array $table 要连接的表,子查询用数组形式表示,键为别名,值为Query实例
     * @param string|array $on 条件,如果要使用'字段1 = 字段2'的形式,请用字符串带入,用数组的话'字段2'将被解析为绑定参数
     * @param array $params 绑定的参数,应为key=>value形式
     * @return \lying\db\Query
     */
    public function join($type, $table, $on = null, $params = [])
    {
        $this->join[] = [$type, $table, $on, $params];
        return $this;
    }
    
    /**
     * 设置查询条件
     * @param string|array $condition 要查询的条件
     * 如果要使用'字段1 = 字段2'的形式,请用字符串带入,用数组的话'字段2'将被解析为绑定参数
     * e.g. where("user.id = admin.id and name = :name", [':name'=>'lying']);
     * e.g. where(['id'=>1, 'name'=>'lying']);
     * e.g. where(['id'=>[1, 2, 3]], ['or', 'name'=>'lying', 'sex'=>1]);
     * @param array $params 当$condition为字符串时,绑定参数的数组
     * @return \lying\db\Query
     */
    public function where($condition, $params = [])
    {
        $this->where = [$condition, $params];
        return $this;
    }
    
    /**
     * 设置分组查询
     * @param string|array 要分组的字段
     * e.g. groupBy('id, sex');
     * e.g. groupBy(['id', 'sex']);
     * @return \lying\db\Query
     */
    public function groupBy($columns)
    {
        if (is_string($columns)) {
            $tables = preg_split('/\s*,\s*/', trim($columns), -1, PREG_SPLIT_NO_EMPTY);
        }
        $this->groupBy = $columns;
        return $this;
    }
    
    /**
     * 聚合筛选
     * @param string|array $condition 参见where()
     * @param array $params 参见where()
     * @return \lying\db\Query
     */
    public function having($condition, $params = [])
    {
        $this->having = [$condition, $params];
        return $this;
    }
    
    /**
     * 设置排序
     * @param $columns 要排序的字段和排序方式
     * e.g. orderBy('id, name desc');
     * e.g. orderBy(['id'=>SORT_DESC, 'name']);
     * @return \lying\db\Query
     */
    public function orderBy($columns)
    {
        if (is_string($columns)) {
            $columns = preg_split('/\s*,\s*/', trim($columns), -1, PREG_SPLIT_NO_EMPTY);
            foreach ($columns as $key => $column) {
                if (preg_match('/^(.*?)\s+(asc|desc)$/i', $column, $matches)) {
                    $res[$matches[1]] = strcasecmp($matches[2], 'DESC') ? SORT_ASC : SORT_DESC;
                } else {
                    $res[$column] = SORT_ASC;
                }
            }
            $this->orderBy = isset($res) ? $res : [];
        }else {
            $this->orderBy = $columns;
        }
        return $this;
    }
    
    /**
     * 设置限制查询的条数
     * @param integer $offset 偏移的条数,如果只提供此参数,则等同于limit(0, $offset)
     * e.g. limit(10);
     * e.g. limit(5, 20);
     * @param integer $limit 限制的条数
     * @return \lying\db\Query
     */
    public function limit($offset, $limit = null)
    {
        $this->limit = [$offset, $limit];
        return $this;
    }
    
    /**
     * 设置联合查询,可多次使用
     * @param Query $query 子查询
     * @param boolean $all 是否使用UNION ALL,默认false
     * @return \lying\db\Query
     */
    public function union(Query $query, $all = false)
    {
        $this->union[] = [$query, $all];
        return $this;
    }
    
    
    
    /**
     * 查询数据
     * @param string $method 查询的方法
     * @return mixed 查询的数据,失败返回false
     */
    private function fetch($method)
    {
        list($statement, $params) = $this->build();
        $sth = $this->connection->prepare($statement);
        $res = $sth->execute($params) ? call_user_func([$sth, $method]) : false;
        $sth->closeCursor();
        return $res;
    }
    
    /**
     * 返回结果集中的一条记录
     * @return mixed
     */
    public function one()
    {
        return $this->fetch('fetch');
    }
    
    /**
     * 返回所有查询结果的数组
     * @return mixed
     */
    public function all()
    {
        return $this->fetch('fetchAll');
    }
    
    /**
     * 从结果集中的下一行返回单独的一列,查询结果为标量
     * @return mixed
     */
    public function column()
    {
        return $this->fetch('fetchColumn');
    }
    
    /**
     * 插入一条数据
     * @param string $table 要插入的表名
     * @param array $datas 要插入的数据,(name => value)形式的数组
     * 当然value可以是子查询,Query的实例,但是查询的表不能和插入的表是同一个
     * @return integer|boolean 返回受影响的行数,有可能是0行,失败返回false
     */
    public function insert($table, $datas)
    {
        foreach ($datas as $col => $data) {
            $cols[] = $this->quoteColumn($col);
            if ($data instanceof self) {
                list($statement, $params) = $data->build($params);
                $palceholders[] = "($statement)";
            } else {
                $palceholders[] = $this->buildPlaceholders($data, $params);
            }
        }
        $table = $this->quoteColumn($table);
        $statement = "INSERT INTO $table (" . implode(', ', $cols) . ') VALUES (' . implode(', ', $palceholders) . ')';
        $sth = $this->connection->prepare($statement);
        return $sth->execute($params) ? $sth->rowCount() : false;
    }
    
    /**
     * 批量插入数据
     * @param string $table 要插入的表名
     * @param array $columns 要插入的字段名
     * @param array $datas 要插入的数据,应为一个二维数组
     * e.g. batchInsert('user', ['name', 'sex'], [
     *     ['user1', 1],
     *     ['user2', 0],
     *     ['user3', 1],
     * ])
     * @return integer|boolean 返回受影响的行数,有可能是0行,失败返回false
     */
    public function batchInsert($table, $columns, $datas)
    {
        foreach ($datas as $row) {
            $v[] = '(' . implode(', ', $this->buildPlaceholders($row, $params)) . ')';
        }
        $table = $this->quoteColumn($table);
        $columns = array_map(function($col) {
            return $this->quoteColumn($col);
        }, $columns);
        $statement = "INSERT INTO $table (" . implode(', ', $columns) . ') VALUES ' . implode(', ', $v);
        $sth = $this->connection->prepare($statement);
        return $sth->execute($params) ? $sth->rowCount() : false;
    }
    
    /**
     * 更新数据
     * @param string $table 要更新的表
     * @param array $datas 要更新的数据,(name => value)形式的数组
     * 当然value可以是子查询,Query的实例,但是查询的表不能和更新的表是同一个
     * @param string|array $condition 更新的条件,参见where()
     * @param array $params 条件的参数,参见where()
     * @return integer|boolean 返回受影响的行数,有可能是0行,失败返回false
     */
    public function update($table, $datas, $condition = '', $params = [])
    {
        foreach ($datas as $name => $data) {
            if ($data instanceof self) {
                list($statement, $p) = $data->build($p);
                $palceholders[] = $this->quoteColumn($name) . " = ($statement)";
            } else {
                $palceholders[] = $this->quoteColumn($name) . ' = ' . $this->buildPlaceholders($data, $p);
            }
        }
        $table = $this->quoteColumn($table);
        $statement = "UPDATE $table SET " . implode(', ', $palceholders);
        $where = $this->buildCondition($condition, $params, $p);
        $statement = $statement . (empty($where) ? '' : " WHERE $where");
        $sth = $this->connection->prepare($statement);
        return $sth->execute($p) ? $sth->rowCount() : false;
    }
    
    /**
     * 删除数据
     * @param string $table 要删除的表
     * @param string|array $condition 删除的条件,参见where()
     * @param array $params 条件的参数,参见where()
     * @return integer|boolean 返回受影响的行数,有可能是0行,失败返回false
     */
    public function delete($table, $condition = '', $params = [])
    {
        $table = $this->quoteColumn($table);
        $statement = "DELETE FROM $table";
        $where = $this->buildCondition($condition, $params, $p);
        $statement = $statement . (empty($where) ? '' : " WHERE $where");
        $sth = $this->connection->prepare($statement);
        return $sth->execute($p) ? $sth->rowCount() : false;
    }
}
