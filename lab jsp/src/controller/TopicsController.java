package controller;

import domain.Comment;
import domain.Topic;
import model.DBManager;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

public class TopicsController extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String action = request.getParameter("action");

        if ((action != null) && action.equals("getAll")) {
            response.setContentType("application/json");
            DBManager dbmanager = new DBManager();
            List<Topic> topics = dbmanager.getTopics();
            JSONArray jsonArray = new JSONArray();
            for (Topic topic : topics) {
                JSONObject jObj = new JSONObject();
                jObj.put("id", topic.getId());
                jObj.put("name", topic.getName());
                jsonArray.add(jObj);
            }
            PrintWriter out = new PrintWriter(response.getOutputStream());
            out.println(jsonArray.toJSONString());
            out.flush();
        }
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String name = request.getParameter("name");
        PrintWriter out = response.getWriter();
        DBManager dbmanager = new DBManager();
        int id = dbmanager.getTopics().size() + 1;
        List<Topic> topics = dbmanager.getTopics();
        boolean present = false;
        for (Topic t : topics) {
            if (t.getName().equals(name)) {
                present = true;
                out.print("Topic already in database!");
                out.close();
            }
        }
        if (!present)
            dbmanager.addTopic(id, name);
        out.print("Topic added successfully!");
    }
}
