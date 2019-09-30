$(document).ready(function() {
    $("#addStudentBtn").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/home/add",
            data: {
                first_name: $("#studentAddForm input[name=firstName]").val(),
                last_name: $("#studentAddForm input[name=lastName]").val(),
                sex: $("#studentAddForm input[name=sex]").val(),
                birthdate: $("#studentAddForm input[name=birthday]").val(),
                group: $("#studentAddForm input[name=group]").val(),
                faculty: $("#studentAddForm input[name=faculty]").val(),
            },
            dataType: "json",
            success: function(data) {
                $("#studentAddForm").trigger("reset");
                $("#studentAddModal .modal-content .close").click();
                updateTable();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $("#studentAddModal #add-student-errors").html("");
                $.each(errors.messages, function(key, value) {
                    $("#studentAddModal #add-student-errors").append("<li>" + value + "</li>");
                });
                $("#studentAddModal #add-error-bag").show();
            }
        });
    });
    $("#editStudentBtn").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: "/home/" + $("#studentEditForm #editStudentBtn").val(),
            data: {
                first_name: $("#studentEditForm input[name=firstName]").val(),
                last_name: $("#studentEditForm input[name=lastName]").val(),
                sex: $("#studentEditForm input[name=sex]").val(),
                birthdate: $("#studentEditForm input[name=birthday]").val(),
                group: $("#studentEditForm input[name=group]").val(),
                faculty: $("#studentEditForm input[name=faculty]").val(),
            },
            dataType: "json",
            success: function(data) {
                $("#studentEditForm").trigger("reset");
                $("#studentEditForm .modal-content .close").click();
                updateTable();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $("#studentEditForm #edit-student-errors").html("");
                $.each(errors.messages, function(key, value) {
                    $("#studentEditForm #edit-student-errors").append("<li>" + value + "</li>");
                });
                $("#studentEditForm #edit-error-bag").show();
            }
        });
    });
    $("#removeStudentBtn").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: "/home/" + $("#removeStudentBtn").val(),
            dataType: "json",
            success: function(data) {
                $("#studentRemoveModal .modal-content .close").click();
                updateTable();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchData(page);
    });
});

function addStudentForm() {
    $(document).ready(function() {
        $("#studentAddModal #add-error-bag").hide();
        $("#studentAddModal").modal("show");
    });
}

function editStudentForm(student_id) {
    $.ajax({
        type: "GET",
        url: "/home/" + student_id,
        success: function(data) {
            $("h4.modal-title").html("Edit info for student #" + data.student.id);
            $("#edit-error-bag").hide();
            $("#studentEditForm input[name=firstName]").val(data.student.first_name);
            $("#studentEditForm input[name=lastName]").val(data.student.last_name);
            var checkbox = data.student.sex ? $("#studentEditForm #radioMale") : $("#studentEditForm #radioFemale"); 
            checkbox.prop("checked", true);   
            $("#studentEditForm input[name=birthday]").val(data.student.birthdate);
            $("#studentEditForm input[name=group]").val(data.student.group);
            $("#studentEditForm input[name=faculty]").val(data.student.faculty);
            $("#editStudentBtn").val(data.student.id);
            $("#studentEditModal").modal("show");
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function removeStudentForm(student_id) {
    $.ajax({
        type: "GET",
        url: "/home/" + student_id,
        success: function(data) {
            var title = "Remove Student #"
            title += data.student.id + "<br>"
            title += data.student.first_name + " "
            title += data.student.last_name
            $("h4.modal-title").html(title);
            $("#removeStudentBtn").val(data.student.id);
            $("#studentRemoveModal").modal("show");
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function fetchData(page){
    $.ajax({
        url: "/home/fetch_data?page=" + page,
        success: function(data){
            $("#userInfoBlock").html(data)
        }
    });
}

function updateTable(){
    var page = 1;
    
    if ($("#pagesBlock").length) { 
        page = $(".pagination .active .page-link").text(); 
    }

    fetchData(page);    
}