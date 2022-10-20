<?php
  include "./database.php";

  if(isset($_POST["hiddenName"])){
    $titleEdit = $_POST["editTitle"];
    $noteEdit = $_POST["editNoteBody"];
    $hidden =$_POST["hiddenName"];

    $update = "UPDATE `notes-app-table` SET `Sr No.`='$hidden', `Title`='$titleEdit',`Note`='$noteEdit' WHERE `Sr No.`='$hidden'";

    $res = mysqli_query($con, $update);

    header("location: ./index.php");
  }

    echo '
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Note</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          <form method="POST">
          <input type="hidden" name="hiddenName" id="hiddenInput">
              <div class="mb-3 my-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="editTitle" placeholder="Enter the title of your note" name="editTitle">
              </div>
              <div class="mb-3">
                  <label for="body" class="form-label">Body</label>
                  <textarea type="text" class="form-control" id="editBody" style="height: 150px;" placeholder="Enter the body of your note" name="editNoteBody"></textarea>
              </div>
              
          </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
          </div>
        </div>
      </div>
    </div>';