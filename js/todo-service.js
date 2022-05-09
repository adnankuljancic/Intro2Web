var ToDoService = {
  init: function() {
    $('#addTodoForm').validate({
      submitHandler: function(form) {
        var todo = Object.fromEntries((new FormData(form)).entries());
          ToDoService.add(todo);
      }
    });
    ToDoService.list();
  },
  list: function() {
    $.get("rest/todos", function(data) {

      var html = "";
      for (let i = 0; i < data.length; i++) {
        html += `
        <div class="col-lg-3">

        <div class="card" style="width: 18rem;">
         <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_180a9dc0095%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_180a9dc0095%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1875%22%20y%3D%2296.20000038146972%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
         <div class="card-body">
         <h5 class="card-title">` + data[i].description + `</h5>
         <p class="card-text">` + data[i].created + ` :Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         <div class="btn-group" role="group">
           <button type="button" class="btn btn-primary todo-button" onClick="ToDoService.get(` + data[i].id + `)">Edit</button>
           <button type="button" class="btn btn-danger todo-button" onClick="ToDoService.delete(` + data[i].id + `)">Delete</button>
         </div>
           </div>
  </div>
</div>`;
        $("#todo-list").html(html);
      }
      console.log(data);
    });
  },
  get: function(id) {
    $(".todo-button").attr("disabled", true);
    $.get('rest/todos/' + id, function(data) {
      console.log(data);
      //$("#exampleModal .modal-body").html(id);
      $("#id").val(data.id);
      $("#description").val(data.description);
      $("#created").val(data.created);
      $("#exampleModal").modal("show");
    });
    $(".todo-button").attr("disabled", false);
  },
  add: function(todo) {
    $.ajax({
      url: 'rest/todos/',
      type: 'POST',
      data: JSON.stringify(todo),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        $("#todo-list").html(`<div class="spinner-border" role="status"><span class="sr-only"></span></div>`);
        ToDoService.list();
        console.log(result);
        $("#addTodoModal").modal("hide");

      }
    });
  },
  update: function() {
    var todo = {};
    //todo.id = $('#id').val();
    todo.description = $('#description').val();
    todo.created = $('#created').val();
    $.ajax({
      url: 'rest/todos/' + $('#id').val(),
      type: 'PUT',
      data: JSON.stringify(todo),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        $("#todo-list").html(`<div class="spinner-border" role="status"><span class="sr-only"></span></div>`);
        $("#exampleModal").modal("hide");
        ToDoService.list();
      }
    });

  },
  delete: function(id) {
    $('.todo-button').attr('disabled', true);
    $.ajax({
      url: 'rest/todos/' + id,
      type: 'DELETE',
      success: function(result) {
        $("#todo-list").html(`<div class="spinner-border" role="status"><span class="sr-only"></span></div>`);
        ToDoService.list();
        $('.todo-button').attr('disabled', false);
      }
    });
  }
}
