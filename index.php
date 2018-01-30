<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>聊天页面</title>
    <link rel="stylesheet" href="index.css">
    <script type="text/javascript">
        var time = setInterval(function() {
            getMsg()
        }, 500);

        var oxmlHttp;
        var oxmlHttpSend;

        function getMsg() {
            if (typeof XMLHttpRequest != "undefined") {
                oxmlHttp = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
            }
            if (oxmlHttp == null) {
                alert("浏览器不支持XML Http Request！");
                return;
            }
            oxmlHttp.onreadystatechange = getMsg_result; //获取到的信息返回函数
            oxmlHttp.open("GET", encodeURI("chat_recv_ajax.php"), true);
            oxmlHttp.send(null);
        }

        function getMsg_result() {
            if (oxmlHttp.readyState == 4 || oxmlHttp.readyState == "complete") {
                if (document.getElementById("DIV_CHAT") != null) {
                    document.getElementById("DIV_CHAT").innerHTML = oxmlHttp.responseText;
                    oxmlHttp = null;
                }
                var scrollDiv = document.getElementById("DIV_CHAT");
                scrollDiv.scrollTop = scrollDiv.scrollHeight;
            }
        }

        function set_chat_msg() {
            if (typeof XMLHttpRequest != "undefined") {
                oxmlHttpSend = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                oxmlHttpSend = new ActiveXObject("Microsoft.XMLHttp");
            }
            if (oxmlHttpSend == null) {
                alert("浏览器不支持XML Http Request！");
                return;
            }
            var url = "chat_send_ajax.php";
            var strname = "noname";
            var strmsg = "";
            if (document.getElementById("txtname") != null) {
                strname = document.getElementById("txtname").value;
            }
            if (document.getElementById("txtmsg") != null) {
                strmsg = document.getElementById("txtmsg").value;
                document.getElementById("txtmsg").value = "";
            }
            url += "?name=" + strname + "&msg=" + strmsg;
          //  url="chat_send_ajax.php?name=strname&msg=strmsg"
            oxmlHttpSend.open("GET", encodeURI(url),true);
            oxmlHttpSend.send(null);
        }

        function clickBtn() {
            if (window.event.keyCode == 13) {
                document.getElementById("Submit2").click();
                window.event.returnValue = false;
            }
        }
    </script>
</head>
<?php session_start();?>
<body align="center">
    <div style="border: black thin solid;height: 450px;width: 500px;  align:center">
        <div>
            <table align="center">
                <tr>
                    <td colspan="2" style="font-weight: bold; font-size: 16pt;text-align: center">
                        聊天窗口
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight: bold; font-size: 16pt;
          text-align: left">
                        <table style="font-size: 12pt; border: white thin solid; ">
                            <tr>
                                <td style="width: 100px">
                                    聊天昵称:</td>

                                <td style="width: 100px"><input id="txtname" style="width: 150px" type="text" name="name" maxlength="15" value="<?php echo $_SESSION['user'];?>" readOnly/></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;" valign="middle" colspan="2">
                        <div style="width: 480px; height: 300px; border-right: white thin solid; border-top: white thin solid; font-size: 10pt; border-left: white thin solid; border-bottom: white thin solid; font-family: verdana, arial; overflow:scroll; text-align: left;" id="DIV_CHAT">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 310px">
                        <input id="txtmsg" style="width:350px" type="text" name="msg" onkeydown="return clickBtn()" /></td>
                    <td style="width: 85px">
                        <input id="Submit2" type="button" value="发送" onclick="set_chat_msg()" /></td>
                </tr>
            </table>
        </div>
</body>

</html>