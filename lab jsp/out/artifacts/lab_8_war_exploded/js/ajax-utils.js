function getAllTopics(callbackFunction) {
    $.getJSON("TopicsController", {action:'getAll'}, callbackFunction);
}

function getCommentsByTopic(topicID, callbackFunction) {
    $.getJSON("CommentsController", {action:'getAll', topicID:topicID}, callbackFunction);
}

function updateComment(id, topicID, userID, newbody, callbackFunction) {
    $.get("CommentsController",
        { action: "update", id:id, topicID:topicID, userID:userID, body: newbody }, callbackFunction);
}