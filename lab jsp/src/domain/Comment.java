package domain;

public class Comment {
    private int id;
    private int topicID;
    private int userID;
    private String body;

    public Comment(int id, int topicID, int userID, String body) {
        this.id = id;
        this.topicID = topicID;
        this.userID = userID;
        this.body = body;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getTopicID() {
        return topicID;
    }

    public void setTopicID(int topicID) {
        this.topicID = topicID;
    }

    public int getUserID() {
        return userID;
    }

    public void setUserID(int userID) {
        this.userID = userID;
    }

    public String getBody() {
        return body;
    }

    public void setBody(String body) {
        this.body = body;
    }
}
