@extends('layouts.main')@section('title', 'Membership Registration')@section('main')<script
    src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key')}}"></script>
<div class="main_content">
    <div
        class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">
        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3">Membership Registration</div>
            <div class="text-white text-lg font-medium text-opacity-90">Ensure your information are accurate 
            </div>
        </div>
    </div>
    <div class="mcontainer">
        <div class="-mt-16 bg-white max-w-2xl mx-auto p-10 relative rounded-md shadow">
            <form method="POST"  action="{{ route('register')}}" id="registerForm" enctype="multipart/form-data">
                <x-jet-validation-errors class="mb-4" />
                <div class="grid md:grid-cols-2 md:gap-y-7 md:gap-x-6 gap-6">@csrf <input type="hidden"
                        class="g-recaptcha" name="recaptcha_token" id="recaptcha_token">
                    <div class="line"><input class="line__input" id="email" required autofocus name="name" type="name"
                            onkeyup="this.setAttribute('value', this.value);" value="{{ old('name')}}"
                            autocomplete="off"><span for="name" class="line__placeholder">Name </span></div>
                    <div class="line"><input class="line__input" id="lastname" required autofocus name="lastname"
                            type="lastname" onkeyup="this.setAttribute('value', this.value);"
                            value="{{ old('lastname')}}" autocomplete="off"><span for="lastname"
                            class="line__placeholder">Last name </span></div>
                    <div class="line"><input class="line__input" id="email" required autofocus name="email" type="email"
                            onkeyup="this.setAttribute('value', this.value);" value="{{ old('email')}}"
                            autocomplete="off"><span for="email" class="line__placeholder">Email </span></div> 
                    <div class="line"><select type="text" placeholder="Gender" name="gender"
                            class="selectpicker">
                            <option value="{{ old('gender')}}">Select Gender </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select></div>
                    <div class="line"><input class="line__input" id="tel" required autofocus name="phoneNumber"
                            type="tel" onkeyup="this.setAttribute('value', this.value);" value="{{ old('phoneNumber')}}"
                            autocomplete="off"><span for="phoneNumber" class="line__placeholder">Phone Number </span>
                    </div>
                    <div class="line"><input class="line__input" id="date" required autofocus name="date_of_birth"
                            type="date" onkeyup="this.setAttribute('value', this.value);"
                            value="{{ old('date_of_birth')}}" autocomplete="off"><span for="date_of_birth"
                            class="line__placeholder">DOB </span></div>
                    <div class="line"><input class="line__input" id="address" required autofocus name="contact_address"
                            type="address" onkeyup="this.setAttribute('value', this.value);"
                            value="{{ old('contact_address')}}" autocomplete="off"><span for="contact_address"
                            class="line__placeholder">Home/Hostel address </span></div>
                    <div class="line"><select type="text" placeholder="Graduate ?" name="academicStatus"
                            class="selectpicker">
                            <option selected disabled value="{{ old('academicStatus')}}">Graduate? Pls Select </option>
                            <option value="Graduate">Yes, Graduate </option>
                            <option value="Postgraduate">No, Postgraduate </option>
                            <option value="Undergraduate">No, Undergraduate </option>
                        </select></div>
                    <div class="line"><select type="text" placeholder="Graduate ?" name="levelInSchool"
                            class="selectpicker">
                            <option selected disabled value="{{ old('levelInSchool')}}">Level? Pls Select </option>
                            <option value="100 Level">100 Level</option>
                            <option value="200 Level">200 Level</option>
                            <option value="300 Level">300 Level</option>
                            <option value="400 Level">400 Level</option>
                            <option value="500 Level">500 Level</option>
                            <option value="600 Level">600 Level</option>
                            <option value="HND1">HND1 </option>
                            <option value="HND2">HND2 </option>
                            <option value="ND1">ND1 </option>
                            <option value="ND2">ND2 </option>
                            <option value="Graduate">Graduate </option>
                            <option value="Pre-Degree">Pre-Degree </option>
                            <option value="Pre-ND">Pre-ND </option>
                            <option value="Post Graduate">Post Graduate </option>
                        </select></div>
                    <div class="line"><select type="text" placeholder="Fellowship Post?" name="positionHeld"
                            class="selectpicker">
                            <option selected disabled value="{{ old('positionHeld')}}">Fellowship Post? Pls Select
                            </option>
                            <option value="ASSISTANT SECRETARY">ASSISTANT SECRETARY </option>
                            <option value="CHOIR MASTER/MISTRESS">CHOIR MASTER/MISTRESS </option>
                            <option value="EVANGELISM SECRETARY">EVANGELISM SECRETARY </option>
                            <option value="FEMALE CO-ORDINATOR">FEMALE CO-ORDINATOR </option>
                            <option value="FINANCIAL SECRETARY">FINANCIAL SECRETARY </option>
                            <option value="LEVITE CO-ORDINATOR">LEVITE CO-ORDINATOR </option>
                            <option value="PRAYER MINISTRY LEADER">PRAYER MINISTRY LEADER </option>
                            <option value="PRESIDENT">PRESIDENT </option>
                            <option value="PUBLICITY SECRETARY">PUBLICITY SECRETARY </option>
                            <option value="SECRETARY">SECRETARY </option>
                            <option value="TREASURY SECRETARY">TREASURY SECRETARY </option>
                            <option value="VICE PRESIDENT">VICE PRESIDENT </option>
                            <option value="WELFARE SECRETARY">WELFARE SECRETARY </option>
                            <option value="MEMBER">MEMBER </option>
                            <option value="OTHERS">OTHERS </option>
                        </select></div>
                    <div class="line"><select type="text" placeholder="Fellowship Name?" name="yourFellowship"
                            class="selectpicker">
                            <option selected disabled value="{{ old('yourFellowship')}}">Fellowship Name? Pls Select
                            </option>@foreach (App\Models\Institution::all() as $institution) <option
                                value="{{$institution->name}}">{{$institution->name}}</option>@endforeach <option
                                value="{{ old('yourFellowship')}}">{{ old('yourFellowship')}}</option>
                            <option value="Abraham Adesanya Polytechnic, Ijebu Igbo.">Abraham Adesanya Polytechnic,
                                Ijebu Igbo. </option>
                            <option value="Adekunle Ajasin University, Akungba">Adekunle Ajasin University, Akungba
                            </option>
                            <option value="Adeniran Ogunsanya College of Education, Ijanikin">Adeniran Ogunsanya College
                                of Education, Ijanikin </option>
                            <option value="Adeyemi College of Education, Ondo.">Adeyemi College of Education, Ondo.
                            </option>
                            <option value="College of Agricultural Technology, Igboora.">College of Agricultural
                                Technology, Igboora. </option>
                            <option value="College of Education, Ikere- Ekiti">College of Education, Ikere- Ekiti
                            </option>
                            <option value="College of Education, Ilemona">College of Education, Ilemona </option>
                            <option value="College of Education, Ilesa">College of Education, Ilesa </option>
                            <option value="College of education, Ilorin">College of education, Ilorin </option>
                            <option value="College of Education, Minna">College of Education, Minna </option>
                            <option value="College of Education, Oro">College of Education, Oro </option>
                            <option value="College of Education/University of Uyo, Ila Orangun">College of
                                Education/University of Uyo, Ila Orangun </option>
                            <option value="College of Health Technology, Offa.">College of Health Technology, Offa.
                            </option>
                            <option value="Crown Polytechnic, Ado-Ekiti">Crown Polytechnic, Ado-Ekiti </option>
                            <option value="Ekiti State University, Ado Ekiti">Ekiti State University, Ado Ekiti
                            </option>
                            <option value="Emmanuel Alayande College of Education, Lanlate">Emmanuel Alayande College of
                                Education, Lanlate </option>
                            <option value="Emmanuel alayande College of Education, Oyo">Emmanuel alayande College of
                                Education, Oyo </option>
                            <option value="Federal College of Education (Special), Oyo">Federal College of Education
                                (Special), Oyo </option>
                            <option value="Federal College of Education (Technical), Akoka">Federal College of Education
                                (Technical), Akoka </option>
                            <option value="Federal College of Education, Kotangora">Federal College of Education,
                                Kotangora </option>
                            <option value="Federal College of Education, Osiele, Abeokuta">Federal College of Education,
                                Osiele, Abeokuta </option>
                            <option value="Federal College of Education, Zuba-Abuja">Federal College of Education,
                                Zuba-Abuja </option>
                            <option value="Federal College of Fisheries &amp; Fresh Water Management, New Bussa">Federal
                                College of Fisheries &amp; Fresh Water Management, New Bussa </option>
                            <option value="Federal College of Fisheries &amp; Marine Technology, VI.">Federal College of
                                Fisheries &amp; Marine Technology, VI. </option>
                            <option value="Federal polytechnic Ilaro">Federal polytechnic Ilaro </option>
                            <option value="Federal polytechnic Offa">Federal polytechnic Offa </option>
                            <option value="Federal Polytechnic, Ado - Ekiti School of Part Time">Federal Polytechnic,
                                Ado - Ekiti School of Part Time </option>
                            <option value="Federal Polytechnic, Bida">Federal Polytechnic, Bida </option>
                            <option value="Federal Polytechnic, Ede.">Federal Polytechnic, Ede. </option>
                            <option value="Federal Polytechnic, Kaura Namoda">Federal Polytechnic, Kaura Namoda
                            </option>
                            <option value="Federal School of Wildlife Management, New Bussa">Federal School of Wildlife
                                Management, New Bussa </option>
                            <option value="Federal University of Agric, Abeokuta">Federal University of Agric, Abeokuta
                            </option>
                            <option value="Federal University of Technology, Akure">Federal University of Technology,
                                Akure </option>
                            <option value="Federal University of Technology, Minna">Federal University of Technology,
                                Minna </option>
                            <option value="Federal University, Dustinma">Federal University, Dustinma </option>
                            <option value="Federal University, Lokoja">Federal University, Lokoja </option>
                            <option value="Federal University, Oye-Ekiti">Federal University, Oye-Ekiti </option>
                            <option value="Houdegbe North american University, Cotonou">Houdegbe North american
                                University, Cotonou </option>
                            <option value="Igbajo Polytechnic, Igbajo">Igbajo Polytechnic, Igbajo </option>
                            <option value="Interlink, Ijebu Ijesa">Interlink, Ijebu Ijesa </option>
                            <option value="Kogi state University, Anyigba">Kogi state University, Anyigba </option>
                            <option value="Kwara State Polytechnic">Kwara State Polytechnic </option>
                            <option value="Kwara State University, Malete">Kwara State University, Malete </option>
                            <option value="Lagos State College of Health Tech">Lagos State College of Health Tech
                            </option>
                            <option value="Lagos State Polytechnic Isolo/Ikorodu">Lagos State Polytechnic Isolo/Ikorodu
                            </option>
                            <option value="Lagos State University, Epe">Lagos State University, Epe </option>
                            <option value="Lagos State University, Ojo">Lagos State University, Ojo </option>
                            <option value="Lagos University Teaching Hospital, Idi Araba">Lagos University Teaching
                                Hospital, Idi Araba </option>
                            <option value="LAUTECH, Ogbomosho">LAUTECH, Ogbomosho </option>
                            <option value="Michael Otedola College of Primary Education, Naforija, Epe">Michael Otedola
                                College of Primary Education, Naforija, Epe </option>
                            <option value="Moshood Abiola Polytechnic, Abeokuta">Moshood Abiola Polytechnic, Abeokuta
                            </option>
                            <option value="National Open University of Nigeria, Ibadan Centre">National Open University
                                of Nigeria, Ibadan Centre </option>
                            <option value="Niger State Polytechnic, Zungeru">Niger State Polytechnic, Zungeru </option>
                            <option value="Obafemi Awolowo University, Ile Ife.">Obafemi Awolowo University, Ile Ife.
                            </option>
                            <option value="Oduduwa University, Ipetumodu">Oduduwa University, Ipetumodu </option>
                            <option value="Ogun State (ICT) polytechnic, sapade">Ogun State (ICT) polytechnic, sapade
                            </option>
                            <option value="Ogun State D.S Adegbenro ICT Polytechnic, Eruku, Itori - Ewekoro">Ogun State
                                D.S Adegbenro ICT Polytechnic, Eruku, Itori - Ewekoro </option>
                            <option value="Ogun State Institue of Technology, Igbesa">Ogun State Institue of Technology,
                                Igbesa </option>
                            <option value="Ogun State Polytechnic,Satellite Campus, Tanke, Ilorin">Ogun State
                                Polytechnic,Satellite Campus, Tanke, Ilorin </option>
                            <option value="Ogun state School of Health Technology, Ilese">Ogun state School of Health
                                Technology, Ilese </option>
                            <option value="Olabisi Onabanjo University, Ago Iwoye">Olabisi Onabanjo University, Ago
                                Iwoye </option>
                            <option value="Olabisi Onabanjo University, College of Agriculture, Ayetoro">Olabisi
                                Onabanjo University, College of Agriculture, Ayetoro </option>
                            <option value="Olabisi Onabanjo University, college of Medicine, Ikene">Olabisi Onabanjo
                                University, college of Medicine, Ikene </option>
                            <option value="Ondo State School of Health Technology, Akure">Ondo State School of Health
                                Technology, Akure </option>
                            <option value="Ondo State University of Science &amp; Technology Okitipupa">Ondo State
                                University of Science &amp; Technology Okitipupa </option>
                            <option value="Osun State College of Health Technology, Ilesa">Osun State College of Health
                                Technology, Ilesa </option>
                            <option value="Osun State College of Technology, Esa Oke">Osun State College of Technology,
                                Esa Oke </option>
                            <option value="Osun State Polytechnic, Iree.">Osun State Polytechnic, Iree. </option>
                            <option value="Osun State University, Ikire Campus">Osun State University, Ikire Campus
                            </option>
                            <option value="Osun State University, Ipetu-Ijesa Campus.">Osun State University,
                                Ipetu-Ijesa Campus. </option>
                            <option value="Osun State University, Okuku Campus">Osun State University, Okuku Campus
                            </option>
                            <option value="Osun State University, Osogbo Campus">Osun State University, Osogbo Campus
                            </option>
                            <option value="Porto-Novo Chapter">Porto-Novo Chapter </option>
                            <option value="Rufus Giwa Polytechnic, Owo.">Rufus Giwa Polytechnic, Owo. </option>
                            <option value="School of Agric, Akure">School of Agric, Akure </option>
                            <option value="School of forestry, Jericho, Ibadan">School of forestry, Jericho, Ibadan
                            </option>
                            <option value="School of Health Science Technology, Ijero-Ekiti">School of Health Science
                                Technology, Ijero-Ekiti </option>
                            <option value="Tai Solarin College of Education, Omu.">Tai Solarin College of Education,
                                Omu. </option>
                            <option value="Tai Solarin University of Education,Ijagun, Ijebu Ode">Tai Solarin University
                                of Education,Ijagun, Ijebu Ode </option>
                            <option value="The Ibarapa Polytechnic, Eruwa.">The Ibarapa Polytechnic, Eruwa. </option>
                            <option value="The Okeogun Polytechnic, Saki">The Okeogun Polytechnic, Saki </option>
                            <option value="The Polytechnic, Ibadan">The Polytechnic, Ibadan </option>
                            <option value="The Polytechnic, Ile Ife">The Polytechnic, Ile Ife </option>
                            <option value="University of Abuja">University of Abuja </option>
                            <option value="University of Ibadan">University of Ibadan </option>
                            <option value="University of Ilorin, Ilorin">University of Ilorin, Ilorin </option>
                            <option value="University of Jos, Jos">University of Jos, Jos </option>
                            <option value="University of Lagos">University of Lagos </option>
                            <option value="Yaba College of Technology">Yaba College of Technology </option>
                            <option value="Zenith University, Ghana">Zenith University, Ghana </option>
                        </select></select></div>
                    <div class="line"><select type="text" placeholder="Fellowship Name?" name="unit_in_fellowship"
                            class="selectpicker">
                            <option selected disabled value="{{ old('unit_in_fellowship')}}">Unit in Fellowship? Pls
                                Select </option>
                            <option value="Drama Unit">Drama Unit </option>
                            <option value="Choir Unit">Choir Unit </option>
                            <option value="Decorating Unit">Decorating Unit </option>
                            <option value="Usering Unit">Usering Unit </option>
                            <option value="Levites Unit">Levites Unit </option>
                            <option value="Prayer Unit">Prayer Unit </option>
                            <option value="Bible Unit">Bible Unit </option>
                            <option value="Evangelism Unit">Evangelism Unit </option>
                            <option value="Academic Unit">Academic Unit </option>
                            <option value="Media/Publicity Unit">Media/Publicity Unit </option>
                            <option value="OTHER">OTHERS </option>
                        </select></div>
                    <div class="line"><select type="text" placeholder="First Degree Qualification?"
                            name="qualification_one" class="selectpicker">
                            <option selected disabled value="{{ old('qualification_one')}}">First Degree Qualification?
                                Pls Select </option> 
                            <option value="Diploma">Diploma </option>
                            <option value="SSCE">SSCE </option> 
                            <option value="OND">OND </option>
                            <option value="BSc">BSc </option>
                            <option value="HND">HND </option>
                            <option value="MBBS">MBBS </option>
                            <option value="BDS">BDS </option>
                            <option value="BchD">BchD </option>
                            <option value="MSc">MSc </option>
                            <option value="PhD">PhD </option>
                            <option value="PGD">PGD </option>
                            <option value="MBA">MBA </option>
                        </select></div>
                    <div class="line"><input class="line__input" id="degree_one" required autofocus name="degree_one"
                            type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('degree_one')}}"
                            autocomplete="off"><span for="degree_one" class="line__placeholder">First Degree Institution
                        </span></div>
                    <div class="line"><input class="line__input" id="course_one" required autofocus name="course_one"
                            type="text" onkeyup="this.setAttribute('value', this.value);" value="{{ old('course_one')}}"
                            autocomplete="off"><span for="course_one" class="line__placeholder">First Degree Course Of
                            Study </span></div>
                    <div class="line"><select type="text" name="unificationCurrentPost"
                        class="selectpicker">
                        <option selected disabled value="{{ old('unificationCurrentPost')}}">Central Post? Pls Select
                        </option>
                        <option value="Member">Member </option>
                        <option value="Guest">Guest </option>
                        <option value="NYSC">NYSC Member </option>
                        <option value="CEC">CEC </option>
                        <option value="CWC">CWC </option>
                        <option value="Steering Commitee">Steering Commitee </option>
                    </select> </div>
                    <div class="line"><input class="line__input" id="password" name="password" type="password"
                            autocomplete="current-password" onkeyup="this.setAttribute('value', this.value);"
                            value="{{ old('password')}}" autocomplete="off"><span for="password"
                            class="line__placeholder">Password </span></div>
                    <div class="line"><input class="line__input" id="password" name="password_confirmation"
                            type="password" autocomplete="current-password"
                            onkeyup="this.setAttribute('value', this.value);" value="{{ old('password')}}"
                            autocomplete="off"><span for="password" class="line__placeholder">Confirm Password </span>
                    </div>
                    <div class="md:col-span-2 md:flex items-center justify-between">
                        <div>
                            <div class="checkbox"><input type="checkbox" name="remember_me" required
                                    id="chekcbox2"><label for="chekcbox2"><span class="checkbox-icon"></span><span
                                        class="font-medium text-blue-400">I belong to this fold and my information is
                                        accurate, &amp; agreed to <a href="policy">policy</a> of the
                                        church.</span></label></div>
                        </div>
                    </div>
                    <div class="flex">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-500 hover:text-white font-semibold py-3 px-5 rounded-md text-center text-white mx-auto">
                        Become a member
                        </button>
                    </div>
                </div>
                <form>
        </div>
    </div>
</div>
<script>
grecaptcha.ready(function() {
    document.getElementById('registerForm').addEventListener("submit", function(event) {
        event.preventDefault();
        grecaptcha.execute('{{ config('
            services.recaptcha.site_key ')}}', {
                action: 'register'
            }).then(function(token) {
            document.getElementById("recaptcha_token").value = token;
            document.getElementById('registerForm').submit();
        });
    });
});
</script>@endsection    