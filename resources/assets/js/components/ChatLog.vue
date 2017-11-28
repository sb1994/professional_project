<template>
	<div class="chat-log">
		<chat-message v-for="message in messages" :key="message.id" :message="message">
		</chat-message>
	</div>
</template>
<script>
	export default{
		props:['messages']
	}
</script>
<style>
	.chat-log .chat-message:nth-child(even){
		background-color: #ccc;
	}
</style>