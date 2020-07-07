package controller;

import domain.Comment;
import model.DBManager;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;

public class CommentsController extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String action = request.getParameter("action");

        if ((action != null) && action.equals("update")) {
            Comment comment = new Comment(Integer.parseInt(request.getParameter("id")),
                    Integer.parseInt(request.getParameter("topicID")),
                    Integer.parseInt(request.getParameter("userID")),
                    request.getParameter("body"));
            DBManager dbmanager = new DBManager();
            boolean result = dbmanager.updateComment(comment);
            PrintWriter out = new PrintWriter(response.getOutputStream());
            out.flush();
        } else if ((action != null) && action.equals("getAll")) {
            int topicID = Integer.parseInt(request.getParameter("topicID"));
            response.setContentType("application/json");
            DBManager dbmanager = new DBManager();
            List<Comment> comments = dbmanager.getCommentsForTopic(topicID);
            JSONArray jsonArray = new JSONArray();
            for (Comment comment : comments) {
                String name = dbmanager.getNameFromID(comment.getUserID());
                JSONObject jObj = new JSONObject();
                jObj.put("id", comment.getId());
                jObj.put("userID", comment.getUserID());
                jObj.put("topicID", comment.getTopicID());
                jObj.put("username", name);
                jObj.put("body", comment.getBody());
                jsonArray.add(jObj);
            }
            PrintWriter out = new PrintWriter(response.getOutputStream());
            out.println(jsonArray.toJSONString());
            out.flush();
        }
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        boolean operation = request.getParameter("operation").equals("add");
        if (operation) {
            String body = request.getParameter("body");
            PrintWriter out = response.getWriter();
            DBManager dbmanager = new DBManager();
            int userID = Integer.parseInt(request.getParameter("userID"));
            int topicID = Integer.parseInt(request.getParameter("topicID").replaceAll("\\s+",""));
            int id = dbmanager.getComments().size() + 1;
            dbmanager.addComment(new Comment(id, topicID, userID, body));
            out.print("Comment added successfully!");
        } else {
            int id = Integer.parseInt(request.getParameter("commentID"));
            request.getSession().setAttribute("id", id);
            DBManager.delete(id);
            response.sendRedirect("/home.jsp");
        }
    }
}
