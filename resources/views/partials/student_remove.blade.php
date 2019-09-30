<div class="modal fade" id="studentRemoveModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Remove Student</h4>
                <button aria-hidden="true" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="studentRemoveForm">
                        <p class="h4">
                            Are you sure you want to remove this student?
                        </p>
                        <p class="h5">
                            This action cannot be undone.
                        </p>
                        <br><br>

                    
                        <input class="btn btn-info" data-dismiss="modal" type="button" value="Cancel">
                        <button class="btn btn-danger" id="removeStudentBtn" type="button" value="0">
                            Remove Student
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>