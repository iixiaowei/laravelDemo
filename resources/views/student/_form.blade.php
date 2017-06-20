 <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left">
						{{ csrf_field()}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="{{ isset($member->name)?$member->name:old('Member')['name'] }}" id="name" name="Member[name]" class="form-control col-md-7 col-xs-12">
                          {{ $errors->first('Member.name') }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Age <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="{{ isset($member->age)?$member->age:old('Member')['age'] }}" id="age" name="Member[age]" class="form-control col-md-7 col-xs-12">
                          {{ $errors->first('Member.age') }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sex</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            @foreach($member->sex() as $key=>$val)
                            <input type="radio" name="Member[sex]" value="{{ $key }}" {{ $member->age==$key?"checked":"" }}  > {{ $val }} &nbsp;
                            @endforeach
                             
                          </div>
                        </div>
                      </div>
                       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>