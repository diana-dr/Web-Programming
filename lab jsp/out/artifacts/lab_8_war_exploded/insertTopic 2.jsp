<%--
  Created by IntelliJ IDEA.
  User: dianadragos
  Date: 10/05/2020
  Time: 18:08
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Insert New Topic</title>
</head>
<body>
<form action="TopicsController" method="post">
    <input type="text" id="field" name="name" placeholder="Name"/>
    <input type="submit" class="submit" value="add"/>
</form>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
        // window.close();
    }
</script>
</body>
</html>
