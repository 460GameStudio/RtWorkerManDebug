<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Yeeku.H.Lee(CrazyIt.org)" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title> 使用WebSocket通信 </title>
	<script src="/jquery.1.7.2.js"></script>
	<script type="text/javascript">
		// 创建WebSocket对象
		var webSocket = new WebSocket("ws://45.32.248.129:2347");
		var sendMsg = function()
		{
			// 发送消息
			webSocket.send($("#msg").val());
			// 清空单行文本框
			$("#msg").val("");
		}
		var send = function(event)
		{
			if (event.keyCode == 13)
			{
				sendMsg();
			}
		};
		webSocket.onopen = function()
		{
			// 为onmessage事件绑定监听器，接收消息
			webSocket.onmessage= function(event)
			{
				var show = document.getElementById('show')
				// 接收、并显示消息
				$("#show").append(event.data + "<br/>");
				$("#show").scrollTop($("#show").prop("scrollHeight"));
			}
			$("#msg").keydown = send;
			$("#sendBn").click = sendMsg;
		};
		webSocket.onclose = function ()
		{
			$("#msg").keydown = null;
			$("#sendBn").click = null;
			Console.log('WebSocket已经被关闭。');
		};

//		var webSocket = new WebSocket("ws://45.32.248.129:2347");
//		var sendMsg = function()
//		{
//			// 发送消息
//			webSocket.send($("#msg").val());
//			// 清空单行文本框
//			$("#msg").val("");
//		}
//		var send = function(event)
//		{
//			if (event.keyCode == 13)
//			{
//				sendMsg();
//			}
//		};
//		webSocket.onopen = function()
//		{
//			// 为onmessage事件绑定监听器，接收消息
//			webSocket.onmessage= function(event)
//			{
//				$("#show").append(event.data + "<br/>");
//				$("#show").scrollTop($("#show").prop("scrollHeight"));
//			}
//			$("#msg").keydown = send;
//			$("#sendBn").onclick = sendMsg;
//		};
//		webSocket.onclose = function ()
//		{
//			$("#msg").keydown = null;
//			$("#sendBn").onclick = null;
//			Console.log('WebSocket已经被关闭。');
//		};
	</script>
</head>
<body>
<div style="width:600px;height:240px;
	overflow-y:auto;border:1px solid #333;" id="show"></div>
<input type="text" size="80" id="msg" name="msg" />
<input type="button" value="发送" id="sendBn" name="sendBn"/>
</body>
</html>
