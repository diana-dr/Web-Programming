package model;

import domain.User;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class DBManager {
    private Statement stmt;
    private static Connection connection;

    public DBManager() {
        connect();
    }

    public void connect() {
        try {
            Class.forName("org.gjt.mm.mysql.Driver");
            connection = DriverManager.getConnection("jdbc:mysql://localhost/exam?serverTimezone=UTC", "root", "MySQL9d9d");
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
}
