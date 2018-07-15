
import './bootstrap';




new Vue({
	el: '#app',
	data: {
		reviews: '',
		title: '',
		body: '',
		e_id: '',
		e_title: '',
		e_body: '',
		showModal: '',
		doneDelete: false,
		doneCreate: false,
		doneEdit: false,
		url: 'http://localhost:8000/review/'
	},
	mounted(){
		this.getReview();
		console.log(this.e_title)
		this.doneDelete = false;
		this.doneCreate = false;
		this.doneEdit = false;
	},

	methods:{
		createReview(){

			axios.post('/review', {
				title: this.title,
				body: this.body
			})
			.then(response => this.getReview())
			.catch(error => console.log(error));

			this.title = '';
			this.body = '';
			this.doneCreate = true;
		},
		editReview(){
			var e_id = document.getElementById('e_id');
			var e_title = document.getElementById('e_title');
			var e_body = document.getElementById('e_body');
			
			axios.patch('/review/'+e_id.value, {
				title: e_title.value,
				body: e_body.value
			})
			.then(response => this.getReview())
			.catch(error => console.log(error));
			
			this.showModal = '';
			this.doneEdit = true;
		},
		
		getReview(){

			axios.get('/review/api')
			.then(response => this.reviews = response.data)
			.catch(error => console.log(error));

		},
		setVal(id, title , body){
			this.e_id = id;
			this.e_title = title;
			this.e_body = body;

		},
		deleteReview(review){

			axios.delete('/review/'+review.id)
			.then(response => this.getReview());
			this.doneDelete = true;
		},
		removeAlert(){
			this.doneDelete = false;
			this.doneCreate = false;
			this.doneEdit = false;
		},
		toggleModal(){
			this.showModal = 'is-active';	
		},
		closeModal(){
			this.showModal = '';
		}
	}

});
