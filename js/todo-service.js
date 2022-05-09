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
        <div class="col-lg-4">
          <h2>` + data[i].created + `</h2>
          <p>` + data[i].description + `</p>
          <p>
          </button>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary todo-button" onClick="ToDoService.get(` + data[i].id + `)">Edit</button>
            <button type="button" class="btn btn-danger todo-button" onClick="ToDoService.delete(` + data[i].id + `)">Delete</button>
          </div>
          </p>
        </div> `;
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
