<div id="breadcrumbs">
	<div class="wrap">
		<a href="/">Home</a>
		<span>Reviews</span>
	</div> <!-- /.wrap -->
</div> <!-- /#breadcrumbs -->

<section class="reviews-page">
	<div class="wrap">
		<h1 class="page-title">Feedback from our customers</h1>
		<?php if ($reviews): ?>
			<?php foreach ($reviews as $review): ?>
				<div class="review">
					<div class="avatar"><?= $review->avatar ?></div>
					<div class="name"><?= $review->username ?></div>
					<time class="date js-date" data-locale="ru"><?= $review->date ?></time>
					<div class="description"><?= $review->comment ?></div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div> <!-- /.wrap -->
</section> <!-- /.section-reviews -->