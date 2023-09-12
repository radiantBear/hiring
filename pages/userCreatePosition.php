<?php

include_once "../bootstrap.php";

if(!isset($_SESSION)) {
    @session_start();
}

// Make sure the user is logged in and allowed to be on this page
include_once PUBLIC_FILES . '/lib/authorize.php';
allowIf(verifyPermissions(['user', 'admin']), 'index.php');

$title = 'Create Position';

include_once PUBLIC_FILES."/modules/header.php";

?>

<div class="container py-4">
    <h2 class="text-center">Add A New Position</h2>
    <p class="text-secondary px-5" style="white-space: normal">
        This is a form to create a new position. You will be automatically set as the Committee Chair for this position. 
        After creating the position, you will be given the opportunity to create add qualifications, rounds, candidates,
        and committee members to the position. The site admins will verify all positions before the review process can 
        begin.
    </p>

    <div class="row border border-dark rounded my-3 p-2">
        <h3 class="text-center w-100">General Position Information</h3>

        <!-- Position Title -->
        <div class="input-group p-1">
            <div class="input-group-prepend"><label for="title" class="input-group-text">Position Title</label></div>
            <input class="form-control" id="title" name="title">
        </div>
        <!-- Posting Link -->
        <div class="input-group p-1">
            <div class="input-group-prepend"><label for="postingLink" class="input-group-text">Link to Internal Posting Site</label></div>
            <input class="form-control" id="postingLink" name="postingLink">
        </div>
        <!-- Email Address -->
        <div class="input-group p-1">
            <div class="input-group-prepend"><label for="email" class="input-group-text">Committee Email Address</label></div>
            <input class="form-control" id="email" name="email">
        </div>

        <div class="w-100 mt-1">
            <button id="createBtn" class="btn btn-primary float-right" type="button">Create Position</button>
        </div>
    </div>

</div>

<script>
    document.getElementById('createBtn').addEventListener('click', e => {
        let data = {
            action: 'createPosition',
            title: document.getElementById('title').value,
            postingLink: document.getElementById('postingLink').value,
            email: document.getElementById('email').value
        };

        e.target.disabled = true;

        api.post('/position.php', data).then(res => {
            snackbar(res.message, 'success');
            setTimeout(() => {
                let url = './userDashboard.php'; // Changed to require approval before updating position
                // let url = new URL('./userUpdatePosition.php', document.baseURI);
                // url.searchParams.set('id', res.content);
                
                window.location.replace(url);

            }, 3000);
        }).catch(err => {
            snackbar(err.message, 'error');
            e.target.disabled = false;
        })
    });
</script>

<?php

include_once PUBLIC_FILES."/modules/footer.php"

?>