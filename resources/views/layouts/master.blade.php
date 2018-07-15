<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">

    <title>Laravel</title>

</head>
<body>
    <div id="app">
        <section class="hero is-medium is-primary">
          <div class="hero-body">
            <div class="container">
              <h1 class="title">
               Vue CRUD
           </h1>
           <h2 class="subtitle">
            with Laravel
        </h2>
        <div class="notification is-danger" v-if="doneDelete">
          Review is deleted!
      </div>
      <div class="notification is-success" v-if="doneCreate">
          Review is Created!
      </div>
      <div class="notification is-success" v-if="doneEdit">
          Review is Updated!
      </div>



      <div class="message is-info" v-for="review in reviews" >
        <div class="message-header">
            <p>@{{review.title}}</p>
            
                <button class="button is-success" style="margin-left: 950px" @click.prevent="setVal(review.id, review.title, review.body); toggleModal()">Edit</button>
   
            <div class="modal" :class="showModal">
              <div class="modal-background"></div>
              <div class="modal-content">
                <form :action="url+review.id" method="POST" @submit.prevent="editReview()" >
                {{csrf_field()}}
                {{method_field("patch")}}
                <input class="input is-info" type="hidden" placeholder="Title" id="e_id" name="title" v-model="e_id">
                    <div class="field">
                        <div class="control">
                            <input class="input is-info" type="text" placeholder="Title" id="e_title" name="title" v-model="e_title">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" placeholder="Body" name="body" id="e_body" v-model="e_body"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-info" >Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <button class="modal-close is-large" aria-label="close" @click.prevent="closeModal"></button>
        </div>

        <form :action="url+review.id" method="POST" @submit.prevent="deleteReview(review)">
            {{csrf_field()}}
            {{method_field("delete")}}
            <button type="submit" class="button is-danger">Delete</button>
        </form>


    </div>

    <div class="message-body">
        <p>@{{review.body}}</p>
    </div>
</div>

<div class="field">
    <form action="{{route('review.store')}}" method="POST" @submit.prevent="createReview">
        {{csrf_field()}}
        <div class="field">
            <div class="control">
                <input class="input is-info" type="text" placeholder="Title" name="title" v-model="title" @focus.prevent="removeAlert">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <textarea class="textarea" placeholder="Body" name="body" v-model="body" @focus.prevent="removeAlert"></textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-info" >Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</section>





</div>
<script src="/js/app.js"></script>
</body>
</html>
