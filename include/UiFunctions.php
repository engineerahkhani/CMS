<?php
function successRegisterMessage($message)
{
    echo "<div class=\"alert alert-success\" role=\"alert\">";
    echo $message."</div>";

}
function failedRegisterMessage($message)
{
    echo "<div class=\"alert alert-danger\" role=\"alert\">";
    echo $message."</div>";

}
/**
 * show modal function
 */
function showModal(){
    ?>
    <div id="myModal" class="modal modal-sm fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<?php
}