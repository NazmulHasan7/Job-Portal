<footer class="bg-dark text-center text-white sticky-top fixed-bottom" id="footer">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    <h6 class="text-center">CREATED WITH ❤️ BY JESMIN SULTANA</h6>
  </div>
  <!-- Copyright -->
</footer>

<!--contact message-->
<?php if (isset($_SESSION['contact-message'])){ ?>
	<div class="container-message" id="popup-contact-message">
		<div class="popup-msg" id="popup-success-msg">
			<img src="static/icons/green-tick.png" alt="image not found">
			<h2 style="text-align: center;">Thank You!</h2>
			<p>Your response have been recorded <br> You will get the feedback through mail</p>
			<button type="button" class="submit-btn login-btn" id="msg-btn">OKAY</button>
		</div>
	</div>
<?php } unset($_SESSION['contact-message']); ?>
</div>
<!-- #page -->