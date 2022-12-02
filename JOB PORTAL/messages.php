<?php require_once('config.php') ?>
<?php require_once('includes/head.php') ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('admin_functions.php'); ?>
<?php  include('post_functions.php'); ?>

<!-- None can access this without login -->
<?php  include('includes/admin_warning.php'); ?>
<?php 
    $messages = getAllMessages();
    $counts = getMessageCounts();
    $next_page = 1;
    $previous_page = 1;
?>

<title>ADMIN | MESSAGES</title>
<link rel="shortcut icon" href="static/icons/logo.png">

<?php if (isset($_SESSION['warning'])){ ?>
	<div class="container-message" id="popup-contact-message">
		<div class="popup-msg" id="popup-success-msg">
			<img src="static/icons/warning.png" alt="image not found">
			<h2 style="text-align: center;">Warning!</h2>
			<p><?php echo $_SESSION['warning']; ?></p>
			<button type="button" class="submit-btn login-btn" id="msg-btn">OKAY</button>
		</div>
	</div>
<?php unset($_SESSION['warning']); } ?>

<body>
    <!-- View Modal -->
    <div class="modal fade" id="messageView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style="background: #2980B9;
    background: -webkit-linear-gradient(to left, #FFFFFF, #6DD5FA, #2ac4ea); 
    background: linear-gradient(to left, #FFFFFF, #6DD5FA, #2ac4ea);">
                <div class="modal-header" style="display: unset; border: 0; padding-bottom: 5px;">
                    From: <span class="response-email"></span> <br>
                    Subject: <span class="response-sub"></span> <br>
                    Date: <span class="response-date"></span> <br>
                    Status: <span class="response-status"></span>
                </div>
                <div class="modal-body" style="text-align: justify; padding-bottom: 5px;">
                    
                </div>
                <div class="modal-footer" style="border: 0;">
                    <button type="button" class="btn text-light" data-bs-dismiss="modal" style="background: red;">Close</button>
                    <button type="button" class="btn text-light" style="background:#2ac4ea;">Reply</button>
                </div>
            </div>
        </div>
    </div>

	<div class="main-container d-flex">
		
		<div class="content" style="width: 100%;">
		<?php include('includes/menubar.php') ?>
			<div class="container-fluid px-4" style="height: 600px;">
                
				<header class="entry-header">
					<h1 id="aboutme" class="entry-title">Contact Message</h1>	
				</header>

                <!-- TABLE -->
                <?php if (empty($messages)): ?>
				<h4 style="text-align: center; font-weight:bolder;">NO MESSAGES TO SHOW</h4>
                <p style="text-align: center;"><i class="fal fa-comment-alt-slash fa-10x" style="padding-top: 70px; padding-bottom: 100px"></i></p>
                <?php else: ?>

                    <table class="table table-striped table-hover message-table" style="border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 25%;"><span><i class="fas fa-envelope"></i></span> <span>Email</span></th>
                            <th scope="col" style="width: 55%;"><span><i class="fas fa-comment-alt-lines"></i></span> <span>Subject | Message</span></th>
                            <th scope="col" style="width: 20%; text-align: right;"><span><i class="fas fa-cogs"></i></span> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--PAGINATION-->    
                    <?php if(isset($_GET['pageno'])){
                        $pageno = $_GET['pageno'];
                        $next_page = $pageno + 1;
                        $previous_page = $pageno - 1;
                    }?>
                    <?php foreach ($messages as $message): ?>
						<tr id="tr_<?php echo $message['id']; ?>" style="<?php if($message['seen'] == 0){echo "font-weight: bold";}?>">
							<td style="word-break: break-all;" data-label="Email"><?php echo $message['email']; ?></td>
							<td data-label="Message"><?php echo date("F j, Y ", strtotime($message['submitted_on'])); ?> | <?php echo $message['subject']; ?> <br> <?php echo $message['message']; ?></td>
							<td style="text-align: right;" data-label="Actions">                            
                                <button onclick="viewMessageFromContact('<?php echo $message['id']; ?>')">
                                    <i class="fal fa-envelope-open-text fa-2x" style="color: red; font-size: 22px;" title="View"></i>
                                </button>
                                <a href="mailto:<?php echo $message['email']; ?>?subject=<?php echo $message['subject']; ?>">
                                    <i class="fal fa-paper-plane fa-2x px-1" style=" font-size: 20px; color:red" title="Reply"></i>
                                </a>
                                <button onclick="deleteMessageFromContact('<?php echo $message['id']; ?>')">
                                    <i class="fal fa-trash-alt fa-3x" style="font-size: 19px; color:red" title="Delete"></i>
                                </button>	
							</td>
						</tr>
					    <?php endforeach ?>
                    </tbody>
                    </table>

                    <!--PAGINATION-->
                    <div class="d-flex flex-row-reverse paginator">
                        <a href="messages.php?pageno=<?php echo $next_page; ?>">&nbsp; Next &nbsp;</a>
                        <?php if($previous_page > 0){ ?>
                            <a href="messages.php?pageno=<?php echo $previous_page; ?>">&nbsp; Previous</a>
                        <?php } ?>
                        <?php echo "Total $counts messages"; ?>
                    </div>
                    <?php endif ?>
			</div>
            			
			<!-- footer -->
			<?php include('includes/footer.php') ?>
		</div>
	</div>
</body>
</html>
<?php include('load_script.php') ?>

<script>
    window.onload = function() {
        $(".menu li.active").removeClass('active');
        setActive();
    };
    function setActive() {
        var element = document.getElementById("nav-message");
        element.classList.add("active");
    }
    function deleteMessageFromContact(message_id){
        if(confirm('Are you sure, You want to delete this message?')){
            jQuery.ajax({
                url :"admin_functions.php",
                type:'POST',
                data: {
                    message_id: message_id,
                    action: "delete"
                },
                success:function(response){
                    jQuery('#tr_'+message_id).hide(1000);
                }
            }); 
        }
    }
    function viewMessageFromContact(message_id){
        jQuery.ajax({
            url :"admin_functions.php",
            type:'POST',
            data: {
                message_id: message_id,
                action: "view"
            },
            success:function(response){
                response = JSON.parse(response);
                $('.response-email').text(response.email);
                $('.response-sub').text(response.subject);
                $('.response-date').text(response.submitted_on);
                $('.modal-body').text(response.message);
                jQuery('#tr_'+message_id).css({"font-weight" : "unset"});
                if(response.responded == 0){
                    $('.response-status').text('Not Responded Yet');
                    $('.response-status').css({"color" : "red"});
                }else if(response.responded == 1){
                    $('.response-status').text('Responded');
                    $('.response-status').css({"color" : "green"});
                }
                $('#messageView').modal('show');
            }
        }); 
    }
</script>

