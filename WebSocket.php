<meta charset="UTF-8">
<script src="/jquery.1.7.2.js"></script>
<script>
function send()
{
	ws = new WebSocket("ws://45.32.248.129:2347");
	ws.onopen = function() {
	    ws.send($("#key").val());
	};
	ws.onmessage = function(e) {
	    alert("收到服务端的消息：" + e.data);
	};
	}
</script>

<input type="text" id="key">
<input type="button" onclick="send()" value="提交">