<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lying Trace</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "NSimSun";
      user-select:none;
    }
    body {
      background-image: url("data:image/gif;base64,R0lGODlhywL6APcAAAAAAAAAMwAAZgAAmQAAzAAA/wAzAAAzMwAzZgAzmQAzzAAz/wBmAABmMwBmZgBmmQBmzABm/wCZAACZMwCZZgCZmQCZzACZ/wDMAADMMwDMZgDMmQDMzADM/wD/AAD/MwD/ZgD/mQD/zAD//zMAADMAMzMAZjMAmTMAzDMA/zMzADMzMzMzZjMzmTMzzDMz/zNmADNmMzNmZjNmmTNmzDNm/zOZADOZMzOZZjOZmTOZzDOZ/zPMADPMMzPMZjPMmTPMzDPM/zP/ADP/MzP/ZjP/mTP/zDP//2YAAGYAM2YAZmYAmWYAzGYA/2YzAGYzM2YzZmYzmWYzzGYz/2ZmAGZmM2ZmZmZmmWZmzGZm/2aZAGaZM2aZZmaZmWaZzGaZ/2bMAGbMM2bMZmbMmWbMzGbM/2b/AGb/M2b/Zmb/mWb/zGb//5kAAJkAM5kAZpkAmZkAzJkA/5kzAJkzM5kzZpkzmZkzzJkz/5lmAJlmM5lmZplmmZlmzJlm/5mZAJmZM5mZZpmZmZmZzJmZ/5nMAJnMM5nMZpnMmZnMzJnM/5n/AJn/M5n/Zpn/mZn/zJn//8wAAMwAM8wAZswAmcwAzMwA/8wzAMwzM8wzZswzmcwzzMwz/8xmAMxmM8xmZsxmmcxmzMxm/8yZAMyZM8yZZsyZmcyZzMyZ/8zMAMzMM8zMZszMmczMzMzM/8z/AMz/M8z/Zsz/mcz/zMz///8AAP8AM/8AZv8Amf8AzP8A//8zAP8zM/8zZv8zmf8zzP8z//9mAP9mM/9mZv9mmf9mzP9m//+ZAP+ZM/+ZZv+Zmf+ZzP+Z///MAP/MM//MZv/Mmf/MzP/M////AP//M///Zv//mf//zP///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////yH/C05FVFNDQVBFMi4wAwEAAAAh+QQECgD/ACwAAAAAywL6AAAI/QABCBxIsKDBgwgTKlzIsKHDhxAjSpxIsaLFixgzatzIsaPHjyBDihy5cQXJkxhNolx5UiXLlzBjypxJs6bNmzgFuswZcyfPnwZ9Ah1KtKjRo0iTkhSqtCPTplCjSp1KtarVqwNNPsXKFenWrmDDih1L9qPWsmh5fk3Ltq3bt1PXwtU5V6Pcunjz6t3bMVAgvkEBCx5MuLBhu4fpJl54d7Hjx5CjniXcOHHlyJgza6552W3nzaBDix5N+uFnyqVTq17NOqvo061jy57t+TXt25Zxk4YNmLfu310nA4/se7jx4zZVKkfuuLhe58yjewUAXXrw0dWtaweaffvV7nD9wXsfT16p8O/Yy6tfn1Z88vTs48vH6n6+wvr28+snvr+///914dcegAQWmJqAZSFo4IIMXtfggxBG+F5oCkpo4YVq7YbhhhySVaFYH3Yo4ogghQiWiSSmqOJFKHLV4oowxnifhjLWaCNML96o446Q5Ugfj0AGmZGPVREp5JENGonkkkwmaFuTUEapJFVTRmkle1VeqeWW3GGXJZdgMvdlmGSWqd+YtKFpZn5qTqdim2vKB2eciNG55ZxE4dmannZ6x+dQf5Z2Xp9MBpqTobuxsgKihBrH6IRvNirlk5JWCuCjN2Fq6aYBcurppzJpyhmopK4naqilpjreqTOxqv3qq3HBKuusEbnaE6246mYrS7vm6itOvfL667CsBdsSscgKSmlhxibrbKaGDfrstIpRiNpy1Gbb7EjbWtRtthB+C+640YlrFrnoxmkusuvq2K5T6WLlV7wSvcuRvbkuh2+ky9Ir1QpW/OWvQ/sOObBVARecosIsHkxltQ4fxHDEnVLM0MQUYWxxshpnvPHHLoIssowdT1TyyLSejPLKS6rMsqouNxTzy6TOTPPNRb5mM86W7pyQzzz33G/QRONY9NEEAo2Q0kg3TRPTTpMJdWBRV12i1SFjbdXUrmntdUo0/so1tWOP/XWTZhMrrXRpqzvsCqxQp51LbfcGX75y/osJMZ11+2ovtkbv7TZoa599bt6KCVi44Sv1vSbgdGHr3OKEOs44t5B3PVnmP8tt+WNpf/644J17nnjksIZ++UuUM3Z6ytaufuuMriP+atmyP92w6JqpnvutQnXGe2a+/46qycMb//JZrRcUiBXJ93i38rPXm/r01B8/bvTZd8m9eYFv9v2vAdvIvLBDd2/U+Lmlr/76toNqNvtiv1+9/UfRHy3+C6daPP/5ux32AOg13BHQcAY84Nf+p0CsMbCBEIygBOHnvgnyTH8WRNkDM0i0BHLwaBj8oMXaFkIRkmd+Jkzhj1R4QRa6ECokfOHNSijDeHmwhhocIA43tkGQ/dEQSD8EVxD5N0RdxS+FKKRZEWsUQyW+cInPgiITK0gxKU5RhzysoRXVpkXbnGqLozoiC8EYvhjRTYxjDNvDpigcMpKMik1xI7eoEzdFna+LN6oO50yFOMDJkV+EY9Xk8tY8vZmOdDL8I0r0SJAzbrGNO6Qa4bLmLTRurnaR9JfGPnPHO2bSkG3pjq2Kw8lDnvGToLxiw0wGAEV5Dm6oRE67RElJVh6SYF3LStxiCZy/7e9eHqPbPxQ5wSSu8D2F5KVq8MVI9HjEN3tU5l7Aw0yw5QyRFeFNMqWprNgVyY5X46Z9jPkwcD5TnDnc2vNCQkxp7utk7UQnMPNCyhP9oTGb8sTSp+KJSoZB00nzzKef4Mgsga6KoLVcpUGtM7HTTI2fkdykLUNpsIWyTTDCc9MgLVogiFbSdLDR5j05ehuJQoRP5znfXaDj0Sei5qRJqYxKsQlTksqyfx6zaRVN8yclLUqnx2npGoE6nCYSb6RELRZCo7XOpJb0MMYSqlNzOhiZwhBaU51NzOQi1awOaKlY9eqGZrYWRnVVrBdrDu2uilYJ2SxYZ21r6donMcnI1UIua0ygtnnXM1UVqX2tH0atF1hZNbSw6TosVRHrP7z8FJ+M5SBfI/u2t0x2rpTdp2UzezBzUZOz+YwraMFH0dEmdi7ZEa1pA+jN1eZWqpoKdW1sTNpa2SrVjLaND8YKVs/czvY50/QtF4G7WOGODqzGtZJik2tYNTK3TKp9roGMKl2pVdeF1L0ul26oXf8QKbvdZRNgRULO8Hp3vPAybwtbhVz1qqel0a1ui3ro3pbVtr5QKi9+7YvF/QZJv/4VUnwDrM/7QorADHUue1fwvAGPFsCtaiqCE9xf1rnGwZzF8C0nTC41lY/DqexdnkBM4hI3rr0mRmCKd6ThFWsLvS7GUItj3MsK07hDEL6xiOirYxzbuMd4/TGQL5TjIRMZxUZOspKXIuQlM4i7Tg5ylMcVEAAh+QQECgD/ACwKAAAAwQL6AAAI/QABCBxIsKDBgwgFrkjIsKHDhxAjSpxIsaLFixgzatzIsaPHjyBDihxJsqTJkyhTqsS4cKXLlzBjypxJs6bNmzhz6tzJs6fPn0CDCh1KVGbLoiSPIl3KtKnTp1CjSp1KtarVq1izajW6laLSrmDDih1LtqxZAF/Pql3Ltq3bj2nZxn1Lt67du3jz6t3Lt69fn3PVBv5LuLDhw4gvDk7MuLHjx2ghS55MubJloosva97M2Wpmsp87ix5NGnDp06hTq7YYWmzr1bAPKn0du7bt229bzh64G/dt2l2B+6Z89Oti4cOTV0WuPDXz5o+fQ59Ovbp1iNKva9+uNzv37+D9w4sfT778crvezatfz15h+/fwtaafOj++/fv48+vfn5S///8AQlVfgAQW+NCATyFo4IIMNujgg5sp6JSEEFaoH4VLYWjhhu9pyOGHILLnYYgkfjdiiSimWN2JKrbo4oswxtgQi0LRKOONOOaoY4M27ujjj331COSQjAn5k5FEJqnkkkyihuROTzYpZYhRTmnlWlXqlOWVXHbp5ZeuoQfmmE1uSeaZaKapZk5m2tTmmnDGKeecG71Jk5105gkdnnr2+RKffgYKG6AwESrooYgmOqShfyrq6FaMPiopkZFOail2dVV66aZMLqQppyuKeZinoJYq3kL/mKoqV4UVt/3qq9R9Cmtzsp5U66yO3tofrrz26iuEuo4U7K+BDhuSscQmq+yyeyELF7PQRiutiXc5O+2Z1l6r7Z2ibuvtt+B2li1H44Y7Zbnmpjsaqeq2i2678JLbbbz01mtvWe8qFtm9/PbrL33z/ivwwAT3lK++BScMsMLLHszww6BB3HDAEm/ocMUYm5Zpxr9ezLGP43rs1ccW5ycyyQyejPKNKpvV8soBvgzzzDTPLHPNON90c8737czzzy75DHSH1Q5ttLxHPyp00kw/2/TTES0NdXhSG1T11FhnXd7VBHGtdaxfh72f12JLRTbZZaettm1nr+3221+27SXaltI9N9wF/qFtt7isrLA33mDqBrjcXAoO+OFPE4544BQvbqXiwTku+eTRNU755Zg7CHnmnOvcOWmbf/7x36JXXnLpl5GOOsaqr45Y6xG7blnostd+rO2VwQ6W7rgX2buOvMv3+2S0Cx/88DNarlUgViCvMLvOO1a88NFXb32hGx+fcW/7am/rxtc3Gllahg/nffgelS/b+aexn7D7NcGP/rbyzx9W/fbnr39b0+/v//9u0RsA4YW/AVKlgAbkFQKnBT3/9G+ACzxVAisUwQm+qoIM/I/XMCgtDl7Hg9DymwMt+DplgTBaDbTPCUlYNxY+6IEuxFKBVriw6m0whinDYZLUBx4a/f7PhyAB4v5SeCTl6fB+FDziWYQmRCXSyohO9EwUfwfDKa6niVakExbhJsAsmsyLyKsiGMmzxTGmqYxmNEkX00g0K6JRTW+MTxw1wrsbPox749sXG0EVmDnmrYTgGx3q/HghPT4RkHskIqcIuUeGnE+MjVwJI7MySY55r5KRXBIma/bITIbqR5u0mSEJA0lPqnGUfwmlKaUHxVW6MpKqfGWOYilLRwYSbLVMZS6p1kq2DVKQq6sVLXt5OEUCpZS4GSaMlGnLD3bPPY7TFTPpYpw8TrNEt0Kmb4zptmDZkYyrvOYuUSTOXZZznCQ6pyy1ic52JpCd7oyn/+Apz3oyzo+e9synDYmpz376E3vq/KdA73bLgf7GoHPCJ0IXmrk1MvShEE1fRAc1UTQ5tKJuCQgAIfkEBAoA/wAsAAAAAMoC+gAACP0AAQgcSLCgwYMIEypcyLChw4cQI0qcSLGixYsYM2rcyLGjx48gQ4ocSbKkyY4rTqpMmHKly5cwY8qcSbOmzZs4c+qU2XKnz59AgwodSrSoUY49j0pMqrSp06dQo0qdepQpVZZXs2rdyrWr161WvwIIK7as2bNo06p9SJZr27Vw48qdS7eu3bt48+rd6/UtWL6AAwte6XfwzMJZERtezLixwZaKHUtmGHmy5ct2rbBihZlmZaifO4sebRYyacJpQ59ezVrqipSqW0eM/ZS27Nu4gdrOTZm379/Agws/uHu48ePIbxYvujy58+fQQzYnOj269evYIVYXuj279+/Y/bvrBk++vHm2qc+rX39e/E/37OPLvwx/Z/35+PPzvZ+Tv/7/AM7ln3IBFmigaAPalOCBDDY41YKeOSjhhHpBeBiFGGYoYHoadujhVxby9OGIJCbGYYkopsgcTveFqOKLMKJ34UCwjeWRizHmqKN9NtaI0o5ABnkSjgv5KOSRSAZFpEJGarRkklBO+KRKU0Zp5ZU8YqnllgVVOSSXYG7pJUljhmnmmT+iqWaQZYrU5ppwIvemm3HWaed4d+b54ZzS6emnhnze+OegUqoVKKGIOnZomok2CuCiSDkqKX6QTmqpipVmlOmlnMa1KUafdioqWqFaVOqoqLp1Yqqs7lf90qkUwdrqrB/5J+tStOZq14C3zqbrr3DxuiqwxJZmUq/aFassiF+SuuyzXSWIrIzQVqvosNZmWxVqzmrrbWDTOhTut79aOC656ILm0rm9petuf+t2++68EXJ7Frv0cuoivljl6y+VMPGLkMD/FkwjtgYnvBHBBCrsMFUMP/bwxKCKeC/FGGPVFo4Rd5nxxwIV1rGCIJfMHcImmzwyySm3zKKhLse8ck0zx4zkk6+hbPPDOMO888/x6gx0wTWzPPTRI9VcNNIojrny0kyLqnTUDk85NdVYO5n11ivWezHXYPsqb9j+Qh0w2Wg3dHXa+RL5NNtwE+dz3PSaOzfdZf4DLDTe2uZsb1lm843hgmsLjm6TsgVu+IGIv3r34tm6PTbk1S5ZOOXLKh405pkb/bWepnFuqo00T25n6JrT6vTjg6bOqutnN9q46P2+vDftP7+dKOxIX45777f/bjPvwrvse/FA64488KYvn3vwzn88M/HR7zh99clDjz3G12/vfezfG896+CArT77K46dYI/XnP2h9j6S3z6z2GgZiRcjyG/u5jrPnHyD7a+kJAGk3QP+9q3sGTGDFclTA3x2PRA0UnvkUWLX0UfBfE7ygwR6owbT1rIMKI5zXQEi0pI3lgyQsIZ1CxgrLpRCDJjxh/MD3wrbFsGE1tOH+cpjDCP3yUD4Z/KEQh+gtBBLxW0Y8IhKbp8TKWbCJxeIgFJUlxSkSK4hWzJ8Ps5gdLHIRWP1T1RehtT6xbHGM0YFMCxl2RjRCB3XRcmPnwmgiOUYRfvOzIxgPBjg9louPZvTj+1bHREGWyDQuLKQhmwY/jtFvkRIqI/5ClERIwshIbYyVJWflxU1aKpOe9GAoUeU3/Y2yeKA8JWuqqEpCdbKVrnwiLPmWyll2ho5/sSXnaqlL+siyl3d6JTBP98thGvOYxqkkMvMkzGWiiZXONJMyo6mm0O1wftak5iof6b4ZLgaX2oSmVjK5AvuB05nnhNiuBJMSKwTCm9qUGDcZ6c54/eaFl90KxDvtOTBxmhIw+GReM50V0GgWTXNlLKhBFblDhaKzmIDkZ8sqM66cOdSeA1xBPa9yUX5Ok4/ppI5Epckk/MFzpPxjX0dRmp+QsvRmUTnnSl9KKWrRFEy3kulNUxaZme60j65RWy5/iht/do2otxkoUvkH0aVesqlOfeo8o3pIhlKVgVC9agi1CiWjchWCVv2q+rIq1ryVlU1kPWuGlKrWDnm1rRT6KFyrGta5rnWqdm2QXPOqQ76OFa9+/V9diQnLtz7zpJY0LJx8Si7FBlaw13wsDCUL1shSdnBpvWxNAatZIGa2s/NhK2j149jR6oqxpvXcP1PrINETsvaKry2UZWP7qM/SNlWopWxAAAAh+QQECgD/ACwAAAEAywL5AAAI/QABCBxIsKDBgwgTKlwIYAXDhxAjSpxIsaLFixgzatzIsaPHjyBDihxJsqTJkyhTqjTpcKXLlzBjypxJs6bNmzhzcmypkyLPnkCDCh1KtKjRo0iTKiX6c6nTp1CjSp0KtSnVp1avat1aMCvXr2DDXvV6lKzYs2jTql170yzbmW7fyp1Lt67ds3GB5r3Lt6/fv1L3AvboUPDgw4gTK17MuLHjx5ARGx46OWbhyJgza97MtbJMz5xDix4dFrTmy6RTq17Nuu5l0yxby55NOyHsnLdJotaZu7bv38A/F+0dknjw48jfGn+8PLnz59CxDo9Ovbr1g80dZ7/Ovbv3vtv9v4sffze8S/Pk02dEr769QvY73cufrxg+/fti7YvUj7+//9T8/RdVgLoJaOBgBB6o4IIMNlhSgiNB6OB4Ek5o4YUYZrhUhR9xqKF1Hn4o4ogklhihiShqFWKK2rHo4otjwSijUivOiKCNItaIo0U67ujjj9/1COSQMgpJ5JBGHqnkkkxGlmRFTzbJWZRSVmnlSVQemeWVJm7JJY1fCuillmGWqdGYZqap5po9ocmQm2zGKeecdL4Ip2115qnnnlXeSaKffAYqaEqADmpoi4EdquiijDaKYqGORiqpQZBOailblV6q6aacdupcpgKB6umopJZqamynpqpqh6u2Ov2bqK7GSqastIYGa6245qrrroRSdSuQv/IKnrDESlZsZwTtdmx/wSrZ7LLYTfXsrNBepGy12DI7XbbcRjptt+CG6mu45JZr7qHfnqsudOmu6+678LIGa7vx1mvvpvRKJ+29OObL77/9AizwwARrOm/BCCesMIXjLuzwwxAf52/EFK81ccWXHozxxhx3vNjFHoc8oMgkU1ryyemBjHKgKq/scpsvi9xyzDTXbPODDd+s8848F9jzz0AHbZeoMwtt9NGlaoz00vsxTXDRTkeNp9QAK0311VhzDHXWV2/NdcBfh42p2O56TfbZaB8Lqtlp18p2zm3XR+rbcedXd7h0/t99c956Y2h134AHTivRghdueKt8H6744nH+zfjjkKMb+eS9Jk75fJZfrvnmMDrO+eegM5l56KSX3uDopqeuOn6Er+766yV6Dvvp1KE++6e3W9yQtrmrZzuAcPcu/PD0yU788chft3byzDfPXevORy99cMZPb/31UwaP/cC/b29rjN7X2334qt05PvkpknU++oiyr/j67jdWffz014+X9vbnr/9X8O8/t/9l6h8AOXWtATYJegZMoAK3NTIBLvA/Dnzg2PAnwQpacCUIvKAGN4gqDnrwg4mZHwhjFcERbqWEJswTClOYKBa68IVoySAMZ+hCEdJwVCu8YVJyqMMeqwrPhj4MIgCXJ0TEFTFH4DuiEhPIwyUuqYlObEsSo0jF+kGxilhcnAyzyEXsXbGLNvoiGHs1xpCJsYwoASIa1+i6LbLxjbdTIxzn+Dk30vGOpTsjHjWkxz2eyY8O6yMg1zPFQdZJkIaEUiIXSUMiMvKRj7MjJCd5NzlS8pJZkyQmNxk2TXLykwwslyVBuSNEHtJcpiRlylSZnFGy8pV7oyAsZxk0V9LylqcKCAA7");
      color: #fff;
      height: 100%;
      cursor: default;
    }
    #cmd {
      position: absolute;
      left: 50%;
      top: 50%;
      margin-top: -225px;
      margin-left: -375px;
      width: 750px;
      height: 450px;
      border: 1px outset #fff;
      background-color: #000;
      box-shadow: 2px 2px 0 0 #ccc inset;
      opacity: 0;
    }
    .title {
      font-weight: normal;
      text-indent: 32px;
      height: 24px;
      line-height: 24px;
      font-size: 14px;
      background-color: #0456E6;
      box-shadow: 2px 2px 0 0 #ccc inset;
    }
    .icon {
      height: 14px;
      position: absolute;
      top: 6px;
      left: 6px;
    }
    .btn {
      float: right;
      position: absolute;
      top: 1px;
      right: 2px;
    }
    .btn li {
      margin: 0 1px;
      list-style: none;
      float: left;
    }
    .btn li button {
      position: relative;
      top: 2px;
      width: 20px;
      height: 18px;
      font-weight: bold;
      cursor: pointer;
    }
	.btn li button:focus {
	  outline: none;
	}
    .cmd-body {
      font-size: 14px;
      border: 3px inset #fff;
      width: 100%;
      height: 426px;
      letter-spacing: .5px;
      overflow-y: scroll;
      padding: 0 1px;
    }
  </style>
</head>
<body id="bd">
  <div id="cmd">
    <h1 class="title">恭喜你发现了网站重大BUG！</h1>
    <img class="icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAZCAYAAAAmNZ4aAAABvklEQVRIie2VzWrCQBDHJ2uk4smHEPsIbYMnTyLWa6EH732JlkIPPZdCe+6xUChWJLRVsFVM9OID6F29iCh+1CRbZxPTJjZ+k0PxD8PuzmbntwwzGy6bL9HCZx7c1MGhAHxZKsDJaRJGo9HERbcKuHt4gbPk8cz4/PQI3M3tPQ2Hj36+pk54atujQI0F4TjgJgac7tONzthUr29Z4H17Pri8ONdDGR9omvanqapqmU/Xdj+O4/GYZRGt3+/DYDAwwZdX10C2nd5lRX6nwFWwSrUZZzqdhkwm43ioWCxuDrY7UqkUxONxiMViIIqi6c/lchvDLGAsAidFo1FzHolELHuSJJlzLCgsHrThcMjGbrfLikpRFFZsdvGr3BIv2ev1IBgMQq1Wg0qlAl6vlwVfVXPBmGpBEKDZbEK9Xtd71RDOsTDXgTKwvaoTiQQrLlQgEIBOp2OC5mlRd9jP81SzHmg0GuD3+y0Nv0ywRRezy0w1gqrVKrRarZUCrCsGbrfbIMuy8aNwRzyWPz4I2BJuinxNWsRtKAO7TtyBd+B/C+bE9w9alksLH3knEULA40HzAP52NVVh78K8aKHQPnwDcHAcyM31po8AAAAASUVORK5CYII=" alt="cmd">
    <ul class="btn">
      <li><button>-</button></li>
      <li><button>口</button></li>
      <li><button>X</button></li>
    </ul>
    <div class="cmd-body">
      <p>Lying Framework [Version 2.0.0]</p>
      <p>Copyright (c) 2017 Lying. All rights reserved.</p>
      <br>
      <dl class="info">
        <dd>C:\Info&gt;BUG代号：<?= $code ?></dd>
        <dd>C:\Info&gt;BUG信息：<?= $msg['message'] ?></dd>
        <dd>C:\Info&gt;BUG文件：<?= $msg['file'] ?></dd>
        <dd>C:\Info&gt;BUG行数：<?= $msg['line'] ?></dd>
      </dl>
      <br>
      <dl class="trace">
      	<?php foreach ($trace as $t): ?>
        <dd>C:\Trace&gt;<?= $t ?></dd>
        <?php endforeach; ?>
      </dl>
    </div>
  </div>
</body>
<script>


(function (window) {
  function F(selector) {
    this.drag = function() {
      var flag = false, target, rx, ry;
      this.mousedown(function(e) {
        target = e.target;
        while (target != selector) {
          target = target.parentNode;
        }
        rx = e.pageX - parseInt(target.offsetLeft) || 0;
        ry = e.pageY - parseInt(target.offsetTop) || 0;
        selector.style.position = 'absolute';
        selector.style.cursor = 'move';
        selector.style.opacity = '.5';
        selector.style.transition = 'opacity .3s';
        flag = true;
      }).mouseup(function(e) {
        selector.style.cursor = 'default';
        selector.style.opacity = '1';
        flag = false;
      }).redirect(window.document).mousemove(function(e) {
        if (flag) {
          var diffx = this.documentElement.clientWidth - selector.offsetWidth - 1,
              diffy = this.documentElement.clientHeight - selector.offsetHeight - 1;
          selector.style.margin = '0';
          selector.style.left = (e.pageX - rx > 0 ? (e.pageX - rx < diffx ? e.pageX - rx : diffx) : 0) + 'px';
          selector.style.top = (e.pageY - ry > 0 ? (e.pageY - ry < diffy ? e.pageY - ry : diffy) : 0) + 'px';
        }
      });
      return this;
    }

    this.mousedown = function(call) {
      selector.onmousedown = call;
      return this;
    }

    this.mouseup = function(call) {
      selector.onmouseup = call;
      return this;
    }

    this.mousemove = function(call) {
      selector.onmousemove = call;
    }

    this.fadeIn = function(time) {
      selector.style.transition = 'opacity ' + time + 's';
      selector.style.opacity = '1';
      return this;
    }

    this.ready = function(call) {
      var timer = setInterval(function() {
        if(document && document.getElementsByTagName && document.getElementById && document.body) {
          call();
          clearInterval(timer);
        }
      }, 10);
    }

    this.redirect = function(selector) {
      return $(selector);
    }
  }
  window.$ = function(selector) {
    return typeof selector == 'object' ? new F(selector) : new F(window.document.querySelector(selector));
  }
})(window);


$(document).ready(function() {
  $('#cmd').fadeIn(3).drag();
});
</script>
</html>
