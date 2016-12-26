<?php
namespace lying\logger;


use lying\db\QueryBuilder;
class DbLog extends Logger
{
    /**
     * 数据库连接
     * @var \lying\db\Connection
     */
    protected $connection;
    
    /**
     * 日志表名
     * @var string
     */
    protected $table = 'log';
    
    /**
     * 查询构造器
     * @var QueryBuilder
     */
    protected $qb;
    
    /**
     * 初始化数据库链接
     */
    protected function init()
    {
        try {
            $this->connection = $this->make()->getDb($this->connection);
            $this->qb = $this->connection->createQuery();
            $sql = "CREATE TABLE IF NOT EXISTS `$this->table` (
            `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `time` DATETIME NOT NULL,
            `ip` VARCHAR(20) NOT NULL,
            `level` VARCHAR(10) NOT NULL,
            `request` VARCHAR(1024) NOT NULL,
            `file` VARCHAR(256) NOT NULL,
            `line` INT(10) UNSIGNED NOT NULL,
            `data` VARCHAR(1024) NOT NULL,
            PRIMARY KEY (`id`)
            )
            COLLATE='utf8_general_ci'
            ENGINE=InnoDB";
            $this->connection->PDO()->exec($sql);
            register_shutdown_function([$this, 'flush']);
        }catch (\Exception $e) {
            if (DEV) {
                throw $e;
            }
        }
    }
    
    /**
     * 生成日志信息
     * @param array $data
     * @return array
     */
    protected function buildTrace($data)
    {
        return $data;
    }
    
    /**
     * 刷新输出日志
     */
    public function flush()
    {
        if ($this->logContainer) {
            try {
                $this->qb->batchInsert($this->table, ['time', 'ip', 'level', 'request', 'file', 'line', 'data'], $this->logContainer);
            }catch (\Exception $e) {
                if (DEV) {
                    throw $e;
                }
            }
            $this->logContainer = [];
        }
    }
}