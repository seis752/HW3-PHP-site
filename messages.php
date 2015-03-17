<?php
include 'core/init.php';
protect_page();
include 'views/common/header.php';
require_once("api/Message.php");
require_once("api/TwilioMessage.php");
require_once("api/User.php");
$userInstance = new User();
$friends = $userInstance->getFriends(null);

$action = $_GET['action'];
$id = $_GET['id'];

if ($action === "seeMessages") {
    // add friend
    $message = new Message();
    $message->seeMessagesofFriends($id);
}

?>


<h2 class="min-spacing text-center">Recent Postings</h2>
<section class="messages-holder">
    <div class="text-center" role="group" aria-label="...">
        <button type="button" class="btn btn-primary custom-btn"
                data-toggle="modal" data-target="#myModal">
            Add Message
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="messages.php">
                        <div class="form-group">
                            <label for="friendPicker">Pick a friend</label>

                            <select name="friends_list" id="per1" class="form-control">
                                <option selected="selected">Choose one</option>
                                <?php
                                foreach ($friends as $f) { ?>
                                    <option value="<?= $f['friend'] ?>"><?= $f['friend'] ?></option>
                                <?php
                                } ?>
                            </select>

                        </div>
                        <div class="form-group ">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message"></textarea>
                        </div>
                        <button type="submit" name="createMessage" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <ul class="messages-list text-center">
        <?php
        $message = new Message();
        $messages = $message->getMyMessages();
        $twilioMessageInst = new TwilioMessage();
        $twilioMessages = $twilioMessageInst->getAllTwilioMessages();
        foreach ($messages as $m) { ?> <!-- We start our foreach loop. -->
            <li>
                <h4>
                    <?php echo $m['date']; ?>
                    -
                    <span>
                         <?php echo $m['username_from']; ?>
                    </span>

                </h4>

                <p>
                    <?php echo $m['message']; ?>
                </p>
            </li>
        <?php } ?> <!-- We end our foreach loop.

        <?php foreach ($twilioMessages as $tm) { ?> <!-- We start our foreach loop for twilio messages -->
        <li>
            <h4>
                <?php echo $tm['ts']; ?>
                -
                    <span>
                         <?php echo $tm['fromnum']; ?>
                    </span>

            </h4>

            <p>
                <?php echo $tm['memo']; ?>
            </p>
        </li>
    <?php } ?> <!-- We end our foreach loop for twilio messages.

    </ul>
</section>

<?php include 'views/common/footer.php' ?>
