
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/ExampleComponent.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
    el: '#app',
    data:{
    	messages:[
			{
				id:'',
				message:'',
				user:{
                    email:'',
                    id:'',
                    name:''
                }
			}
		]
	},
    created(){
        
        axios.get('/chatdemo/public/messages').then(response=>this.messages = response.data);  
    },
    methods:{
    	addMessage(message){
    		//add to existing messages
    		//console.log(message);
    		this.messages.push(message);
            //console.log(this.messages);
    		//persit to the database
    		//console.log('message added');
            
            
            axios.post('/chatdemo/public/messages', message)
            .then(response=>{
                this.messages = response.data;
            }).catch(error => { 
                //this.errors.push(error);
                console.log(error) ;
            })
    	   }
        }

});
