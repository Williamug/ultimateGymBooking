<template>
  <!-- <div id="emailTemplating"> -->
    <form @submit.prevent="addService">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Service</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <!-- title-->
                  <div class="form-group">
                    <label for="title">Title <span class="star">*</span></label>
                    <input type="text" v-model="form.title" class="form-control form-control-sm" name="title" id="title" placeholder="Enter title" :class="{'is-invalid': form.errors.has('title')}">
                    <has-error :form="form" field="title"></has-error>
                  </div>
                  <!-- /.title-->

                  <!-- price-->
                  <div class="form-group">
                    <label for="price">Price <span class="star">*</span></label>
                    <input type="text" v-model="form.price" class="form-control form-control-sm" name="price" id="price" placeholder="Enter price" :class="{'is-invalid': form.errors.has('price')}">
                    <has-error :form="form" field="price"></has-error>
                  </div>
                  <!-- /.price-->

                  <!-- service_duration-->
                  <!-- <div class="form-group">
                    <label for="service_duration">Service Duration <span class="star">*</span></label>
                    <input type="time" v-model="form.service_duration" class="form-control form-control-sm" name="service_duration" id="service_duration" placeholder="hh:mm" :class="{'is-invalid': form.errors.has('service_duration')}">
                    <has-error :form="form" field="service_duration"></has-error>
                  </div> -->
                  <!-- /.service_duration-->

                  <!-- available_seats-->
                  <div class="form-group">
                    <label for="available_seats">Number of Seats Available <span class="star">*</span></label>
                    <input type="text" v-model="form.available_seats" class="form-control form-control-sm" name="available_seats" id="available_seats" placeholder="Enter available seats" :class="{'is-invalid': form.errors.has('available_seats')}">
                    <has-error :form="form" field="available_seats"></has-error>
                  </div>
                  <!-- /.available_seats-->
                
                <!-- instructor -->
                  <div class="form-group">
                    <label>Instructor <span class="star">*</span></label>
                    <select v-for="instructor in instructors" :key="instructor.id" class="form-control form-control-sm" name="instructor">
                      <option>{{ instructor.first_name }}</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                      <option>option 5</option>
                    </select>
                  </div>
                  <!-- /.instructor -->

                  <!-- description-->
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" v-model="form.description" rows="3" placeholder="Enter service description" name="description" :class="{'is-invalid': form.errors.has('description')}"></textarea>
                    <has-error :form="form" field="description"></has-error>
                  </div>
                  <!-- /.description-->

                  
                </div>
                <div class="col-6">
                  <!-- service_starts_at-->
                  <div class="form-group">
                    <label for="service_starts_at">Service Starts <span class="star">*</span></label>
                    <input type="time" v-model="form.service_starts_at" class="form-control form-control-sm" name="service_starts_at" id="service_starts_at" placeholder="hh:mm:ss" :class="{'is-invalid': form.errors.has('service_starts_at')}">
                    <has-error :form="form" field="service_starts_at"></has-error>
                  </div>
                  <!-- /.service_starts_at-->

                  <!-- service_ends_at-->
                  <div class="form-group">
                    <label for="service_ends_at">Service Ends At <span class="star">*</span></label>
                    <input type="time" v-model="form.service_ends_at" class="form-control form-control-sm" name="service_ends_at" id="service_ends_at" placeholder="hh:mm:ss" :class="{'is-invalid': form.errors.has('service_ends_at')}">
                    <has-error :form="form" field="service_ends_at"></has-error>
                  </div>
                  <!-- /.service_ends_at-->
                  
                  <!-- service duration type -->
                  <div class="form-group">
                    <label>Service duration type <span class="star">*</span></label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="hourly" name="service_duration_type" value="1" checked>
                      <label for="hourly" class="custom-control-label">Hourly</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="daily" name="service_duration_type" value="0">
                      <label for="daily" class="custom-control-label">Daily</label>
                    </div>
                  </div>
                  <!-- /.service duration type -->

                  <!-- status -->
                  <div class="form-group">
                    <label for="">Status <span class="star">*</span></label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="active" name="status" value="1">
                      <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="inactive" name="status"  value="0" checked>
                      <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                  </div>
                  <!-- /.status -->

                  <!-- days-->
                  <div class="form-group">
                        <label for="">Days <span class="star">*</span></label>
                       <div class="row">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="monday">
                                  <label for="monday" class="custom-control-label">Monday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="tuesday">
                                  <label for="tuesday" class="custom-control-label">Tuesday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="wednesday">
                                  <label for="wednesday" class="custom-control-label">Wednesday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="thursday">
                                  <label for="thursday" class="custom-control-label">Thursday</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="friday">
                                  <label for="friday" class="custom-control-label">Friday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="saturday">
                                  <label for="saturday" class="custom-control-label">Saturday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="sunday">
                                  <label for="sunday" class="custom-control-label">Sunday</label>
                                </div>
                            </div>
                        </div> 
                  </div>
                  <!-- /.days-->
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn bg-gradient-primary btn-sm">Add Service</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
  <!-- </div> -->
</template>

<script>
    export default {
        data(){
            return{
                instructors: {},
                form: new Form({
                    title: '',
                    message: ''
                })
            }
        },
        methods: {
            loadInstructors(){
                axios.get('api/instructors')
                    .then(({ data }) => (this.instructors = data.data))
            },
            addService(){
                // this.form.post('api/email-templates');
                // $('#emailTemplating').model('hide')
                // Toast({
                //   icon: 'success',
                //   title: 'You have added a new message template'
                // })
            }
        },
    }
</script>
