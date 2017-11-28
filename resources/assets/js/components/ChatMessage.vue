<template>
	<div class="chat-message">
		<!-- <p>{{ message.id }}</p> -->
		<p>{{ message.message }}</p>
		<!-- <small>{{ message.user.id }}</small> -->
		<small>{{ message }}</small>
	</div>
</template>
<script>
	export default{
		props:['message']
	}
</script>
<style>
	.chat-message{
		padding: 1rem;
	}
	.chat-message > p{
		padding: .5rem;
	}
</style>