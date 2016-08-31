/*
 *
 * Custom JS script for frontend behavior.
 *
 */


/*
 * This function generate a Are you sure ? popup and redirect the Ok button to the user deleting url
 */
function deleteUserAlert(userId){

    swal({
        title: "Are you sure?",
        text: "This user will be permanently deleted!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm){
        if (isConfirm) {
            document.getElementById('deleteUserLink-'+userId).click();

        }
    });
}