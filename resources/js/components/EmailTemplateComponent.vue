<template>
  <div id="emailTemplating">
    <form @submit.prevent="createEmailTemplate">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Email Template</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="title">Subject <span class="star">*</span></label>
                <input type="text" v-model="form.title" class="form-control form-control-sm" name="title" id="title" placeholder="Enter subject" :class="{'is-invalid': form.errors.has('title')}">
                <has-error :form="form" field="title"></has-error>
              </div>
              <div class="form-group">
                <label for="email_template">Message <span class="star">*</span></label>
                <textarea class="form-control" v-model="form.message" rows="4" placeholder="Enter email template message" name="email_template" :class="{'is-invalid': form.errors.has('message')}"></textarea>
                <has-error :form="form" field="message"></has-error>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn bg-gradient-primary btn-sm">Save Changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
  </div>
</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    title: '',
                    message: ''
                })
            }
        },
        methods: {
            createEmailTemplate(){
                this.form.post('api/email-templates');
                $('#emailTemplating').model('hide')
                Toast({
                  icon: 'success',
                  title: 'You have added a new message template'
                })
            }
        },
    }
</script>
