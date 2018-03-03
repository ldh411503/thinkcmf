/**
 *******************************************************************
 ************* ─────────────────── **************
 ************* ──  WFPHP在线订单系统官方正式版 ── **************
 ************* ─────────────────── **************
 ************* 官方网站：http://www.wf1805.cn/        **************
 ************* 官方店铺：http://889889.taobao.com/    **************
 ************* 程序开发：WENFEI                       **************
 ************* 客户服务：[淘宝旺旺] yygynui613        **************
 ************* 技术支持：[腾讯QQ] 183712356           **************
 *******************************************************************
 *************   官方正版 *** 版权所有 *** 盗版必究   **************
 *******************************************************************
 */

function GetDateStr(AddDayCount){
	var dd = new Date();
	dd.setDate(dd.getDate()+AddDayCount);
	var y = dd.getFullYear();
	var m = dd.getMonth()+1;
	var d = dd.getDate();	
	return y+"-"+m+"-"+d;
}

var i=0;
for(i=0;i<22;i++){
	document.write(GetDateStr(-1));	
	
	var rand1=parseInt(Math.random()*22+1);	
	write=new Array 
	write[1]=' 北京的' 
	write[2]=' 上海的'
	write[3]=' 天津的'
	write[4]=' 湖南的'
	write[5]=' 湖北的'
	write[6]=' 湖北的'
	write[7]=' 广东的'
	write[8]=' 广西的'
	write[9]=' 重庆的'
	write[10]=' 四川的'
	write[11]=' 山东的'
	write[12]=' 河南的'
	write[13]=' 河北的'
	write[14]=' 山西的'
	write[15]=' 贵州的'
	write[16]=' 黑龙江的'
	write[17]=' 福建的'
	write[18]=' 浙江的'
	write[19]=' 江苏的'
	write[20]=' 江西的'
	write[21]=' 海南的'
	write[22]=' 陕西的'
	var quote=write[rand1]
	document.write(quote)	
	var rand1=parseInt(Math.random()*22+1);	
	write=new Array
	write[1]='张小姐'
	write[2]='刘小姐'
	write[3]='周先生'
	write[4]='吴小姐'
	write[5]='朱先生'
	write[6]='陈小姐'
	write[7]='田小姐'
	write[8]='钟先生'
	write[9]='马小姐'
	write[10]='韩小姐'
	write[11]='顾小姐'
	write[12]='王小姐'
	write[13]='李先生'
	write[14]='卢小姐'
	write[15]='崔小姐'
	write[16]='段先生'
	write[17]='胡小姐'
	write[18]='潘小姐'
	write[19]='陈小姐'
	write[20]='林小姐'
	write[21]='代先生'
	write[22]='苏小姐'	
	var quote=write[rand1]
	document.write(quote)
	var rand1=parseInt(Math.random()*5+1)
	write=new Array
	write[1]='（13'+parseInt(Math.random()*10)+ '****'+ parseInt(Math.random()*10)+ parseInt(Math.random()*10)+parseInt(Math.random()*10)+parseInt(Math.random()*10)+'）' 
	write[2]='（15'+parseInt(Math.random()*10)+ '****'+ parseInt(Math.random()*10)+ parseInt(Math.random()*10)+parseInt(Math.random()*10)+parseInt(Math.random()*10)+'）' 
	write[3]='（13'+parseInt(Math.random()*10)+ '****'+ parseInt(Math.random()*10)+ parseInt(Math.random()*10)+parseInt(Math.random()*10)+parseInt(Math.random()*10)+'）' 
	write[4]='（18'+parseInt(Math.random()*10)+ '****'+ parseInt(Math.random()*10)+ parseInt(Math.random()*10)+parseInt(Math.random()*10)+parseInt(Math.random()*10)+'）' 
	write[5]='（13'+parseInt(Math.random()*10)+ '****'+ parseInt(Math.random()*10)+ parseInt(Math.random()*10)+parseInt(Math.random()*10)+parseInt(Math.random()*10)+'）' 
	var quote=write[rand1]
	document.write(quote)
	document.write('<br>')
	var rand1=parseInt(Math.random()*4+1)
	write=new Array
	write[1]='<p>订购的 产品：(一周期疗效体验装) 2盒送2盒共4盒 已发货 <font color="#FF0000">√</font></p>'
	write[2]='<p>订购的 产品：(两周期激情强效装) 4盒送4盒共8盒 已发货 <font color="#FF0000">√</font></p>'
	write[3]='<p>订购的 产品：(三周期完美巩固装) 6盒送6盒共12盒 已发货 <font color="#FF0000">√</font></p>'
	write[4]='<p>订购的 产品：(四周期完美强化装) 8盒送8盒共16盒 已发货 <font color="#FF0000">√</font></p>'
	var quote=write[rand1]
	document.write(quote)
	document.write('<br>');
}

// WFPHPORDER fahuo.js end