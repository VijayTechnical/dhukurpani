<div>

    <!--====== CONTACT PART START ======-->

    <section id="contact-page" class="pt-40 pb-40 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <h5>Admission Form</h5>
                            <h2>Please fill out the form with correct details.</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form id="contact-form" action="#" method="post" data-toggle="validator" wire:submit.prevent="submitAdmission()">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Full Name:</label>
                                            <input class="form-control" name="name" type="text"
                                                placeholder="Your full name" required="required" wire:model="name">
                                            @error('name')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <div class="form-check">
                                                <label class="form-control-label">Gender:</label>
                                                <div class="row pt-20">
                                                    <div class="col-md-4">
                                                        <label for="male">
                                                            <input type="radio" id="male" name="male" value="male" wire:model="gender"
                                                            style="position: absolute;height: 20px;width:20px;">
                                                            <span class="pl-4">Male</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="female">
                                                            <input type="radio" id="female" name="female" value="female" wire:model="gender"
                                                            style="position: absolute;height: 20px;width:20px;">
                                                            <span class="pl-4">Female</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="other">
                                                            <input type="radio" id="other" name="other" value="other" wire:model="gender"
                                                            style="position: absolute;height: 20px;width:20px;">
                                                            <span class="pl-4">Others</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- singel form -->
                                        @error('gender')
                                            <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Birth Date:</label>
                                            <input class="form-control" name="birth" type="text"
                                                placeholder="mm/dd/yy" required="required" wire:model="birth">
                                            @error('birth')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Nationality:</label>
                                            <input class="form-control" name="nationality" type="text"
                                                placeholder="Nationality" required="required" wire:model="nationality">
                                            @error('nationality')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Email:</label>
                                            <input class="form-control" name="email" type="email" placeholder="Email"
                                                required="required" wire:model="email">
                                            @error('email')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Phone Number:</label>
                                            <input class="form-control" name="phone" type="text"
                                                placeholder="Phone number" required="required" wire:model="phone">
                                            @error('phone')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Contact Address:</label>
                                            <input class="form-control" name="location" type="text"
                                                placeholder="City or Village & Ward No" required="required"
                                                wire:model="location">
                                            @error('address')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Parent Name:</label>
                                            <input class="form-control" name="parent_name" type="text"
                                                placeholder="Parent name"
                                                required="required" wire:model="parent_name">
                                            @error('parent_name')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <div class="form-check">
                                                <label class="form-control-label">Relationship With Parent:</label>
                                                <div class="row pt-20">
                                                    <div class="col-md-6">
                                                        <label for="father">
                                                            <input type="radio" id="father" name="father" value="father" wire:model="parent_relation"
                                                            style="position: absolute;height: 20px;width:20px;">
                                                            <span class="pl-4">Father</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="mother">
                                                            <input type="radio" id="mother" name="mother" value="mother" wire:model="parent_relation"
                                                            style="position: absolute;height: 20px;width:20px;">
                                                            <span class="pl-4">Mother</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- singel form -->
                                        @error('parent_relation')
                                            <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Parent Phone Number:</label>
                                            <input class="form-control" name="parent_number" type="text"
                                                placeholder="Parent Number" required="required"
                                                wire:model="parent_number">
                                            @error('parent_number')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    @if($admission_slug == '+2')
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Choose A Course:</label>
                                            <select name="course_id" id="course_id" wire:model="course_id"
                                                class="form-control">
                                                <option value="">Select a course</option>
                                                @foreach ($courses as $key => $course)
                                                    <option value="{{ $course->id }}">{{ $course->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> <!-- singel form -->
                                        @error('course_id')
                                            <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @else
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Class You Want To Admit:</label>
                                            <input class="form-control" name="class" type="text"
                                                placeholder="Eg: 10" required="required" wire:model="class">
                                            @error('class')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    @endif
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Obtained GPA Of @if($admission_slug == '+2') SEE @else Previous Class @endif:</label>
                                            <input class="form-control" name="gpa" type="text"
                                                placeholder="GPA" required="required" wire:model="gpa">
                                            @error('gpa')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="singel-form form-group">
                                            <label class="form-control-label">Name Of Previous School:</label>
                                            <input class="form-control" name="school" type="text"
                                                placeholder="School Name" required="required" wire:model="school">
                                            @error('school')
                                                <div class="help-block with-errors">{{ $message }}</div>
                                            @enderror
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12" wire:ignore>
                                        <div class="singel-form">
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Submit</button>
                                        </div> <!-- singel form -->
                                    </div>
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->
</div>
