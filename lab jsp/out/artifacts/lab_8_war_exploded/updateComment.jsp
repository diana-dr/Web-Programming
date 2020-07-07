<%--
  Created by IntelliJ IDEA.
  User: dianadragos
  Date: 13/05/2020
  Time: 19:05
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <title>Update Comment</title>
    <script src="js/ajax-utils.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form  class="form1">
    <input type="text" id="field" name="body" placeholder="Body"/>
    <input type="submit" class="submit" onclick="update()"/>
</form>
<script>
    function update() {
        updateComment(
            <%=session.getAttribute("id")%>,
            <%=session.getAttribute("topicID")%>,
            <%=session.getAttribute("userID")%>,
            $("#field").val(),
            function(response) {
                alert("Comment updated successfully!");
                $("#update-result-section").html(response);
            }
        )
    }

    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
        // window.close();
    }
</script>
</body>
</html>
