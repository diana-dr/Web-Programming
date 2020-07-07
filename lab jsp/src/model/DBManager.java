package model;

import domain.Comment;
import domain.Topic;
import domain.User;

import java.sql.*;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class DBManager {
    private Statement stmt;
    private static Connection connection;

    public DBManager() {
        connect();
    }

    public void connect() {
        try {
            Class.forName("org.gjt.mm.mysql.Driver");
            connection = DriverManager.getConnection("jdbc:mysql://localhost/forum?serverTimezone=UTC", "root", "MySQL9d9d");
            stmt = connection.createStatement();
        } catch(Exception ex) {
            System.out.println("eroare la connectare:"+ex.getMessage());
            ex.printStackTrace();
        }
    }

    public static Connection getConnection() {
        return connection;
    }

    public User authenticate(String username, String password) {
        ResultSet rs;
        User u = null;
        System.out.println(username+" "+password);
        try {
            rs = stmt.executeQuery("select * from users where username='" + username + "' and password='" + password + "'");
            if (rs.next()) {
                u = new User(rs.getInt("id"), rs.getString("username"), rs.getString("password"));
            }
            rs.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return u;
    }

    public List<Topic> getTopics() {
        ArrayList<Topic> topics = new ArrayList<>();
        ResultSet rs;
        try {
            rs = stmt.executeQuery("select * from topics");
            while (rs.next()) {
                topics.add(new Topic(
                        rs.getInt("id"),
                        rs.getString("name")
                ));
            }
            rs.close();

        } catch (SQLException e) {
            e.printStackTrace();
        }
        return topics;
    }

    public List<Comment> getComments() {
        ArrayList<Comment> topics = new ArrayList<>();
        ResultSet rs;
        try {
            rs = stmt.executeQuery("select * from comments");
            while (rs.next()) {
                topics.add(new Comment(
                        rs.getInt("id"),
                        rs.getInt("userID"),
                        rs.getInt("topicID"),
                        rs.getString("body")
                        ));
            }
            rs.close();

        } catch (SQLException e) {
            e.printStackTrace();
        }
        return topics;
    }

    public List<Comment> getCommentsForTopic(int topicID) {
        ArrayList<Comment> comments = new ArrayList<>();
        ResultSet rs;
        try {
            rs = stmt.executeQuery("select * from comments where topicID=" + topicID);
            while (rs.next()) {
                comments.add(new Comment(
                        rs.getInt("id"),
                        rs.getInt("topicID"),
                        rs.getInt("userID"),
                        rs.getString("body")
                ));
            }
            rs.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return comments;
    }

    public String getNameFromID(int id) {
        ResultSet rs = null;
        String string = "";
        try {
            rs = stmt.executeQuery("select * from users where id=" + id);
            rs.next();
            string = rs.getString("username");
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return string;
    }

    public boolean updateComment(Comment comment) {
        int r = 0;
        try {
            r = stmt.executeUpdate("update comments set body='" + comment.getBody() + "' where id=" + comment.getId());
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return r > 0;
    }

    public static void delete(int id) {
        try {
            String sql = "delete from comments where id=" + id;
            PreparedStatement statement = DBManager.getConnection().prepareStatement(sql);
            statement.execute();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
    public void addTopic(int id, String name) {
        try {
            stmt.execute("insert into topics values (" + id + ",'" + name + "')");
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void addComment(Comment comment) {
        try {
            stmt.execute("insert into comments values ('" + comment.getId() + "', '" +
                    comment.getUserID() +"', '" + comment.getBody() +"', '" + comment.getTopicID() + "');");
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
