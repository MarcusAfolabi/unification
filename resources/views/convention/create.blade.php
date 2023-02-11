@extends('layouts.main')
@section('title', 'Sub Convention Registration')
@section('description', 'Register for the coming sub convention and ensure to make payment as onsite payment would not be allowed.')
@section('keywords', 'convention, praying ground, mountain, retreat, family reunion, christian, religion, religiou')
@section('canonical', 'https://cnsunification.org/convention')

@section('main')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
<div class="main_content">
    <div
        class="bg-gradient-to-tr flex from-blue-400 h-52 items-center justify-center lg:h-80 pb-10 relative to-blue-300 via-blue-400 w-full">

        <div class="text-center max-w-xl mx-auto z-10 relative px-5">
            <div class="lg:text-4xl text-2xl text-white font-semibold mb-3"> SUB - CONVENTION 2022 </div>
            <div class="text-white text-lg font-medium text-opacity-90"> Ensure to provide accurate information and
                proceed to make payment</div>
        </div>

    </div>
    <div class="mcontainer">
        <div class="-mt-16 bg-white max-w-2xl mx-auto p-10 relative rounded-md shadow">
            <form method="POST" action="{{ route('convention.store') }}" id="conventionForm" enctype="multipart/form-data">
                <x-jet-validation-errors class="mb-4" />
                <div class="grid md:grid-cols-2 md:gap-y-7 md:gap-x-6 gap-6">
                    @csrf
                    <input type="text" placeholder="First Name" value="{{ old('firstname') }}" name="firstname" class="with-border">
                    <input type="text" placeholder="Username" value="{{ old('lastname') }}" name="lastname" class="with-border">
                    <input type="text" placeholder="Last Name" value="{{ old('middlename') }}" name="middlename" class="with-border">
                    <input type="text" placeholder="Email" value="{{ old('email') }}" name="email" class="with-border">
                    <select type="text" placeholder="Gender"  name="gender" class="shadow-none selectpicker with-border">
                        <option value="{{ old('gender') }}"> {{ old('gender') }} - Select Gender </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="tel" placeholder="Phone Number" value="{{ old('phoneNumber') }}" name="phoneNumber"
                        class="shadow-none mt-0 px-5 with-border">

                    <input type="text" placeholder="Contact Address" value="{{ old('contactAddress') }}" name="contactAddress" class="with-border">
                    <select type="text" placeholder="Graduate ?" name="academicStatus"
                        class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('academicStatus') }}"> Graduate? Pls Select </option>
                        <option value="Graduate"> Yes, Graduate </option>
                        <option value="Postgraduate"> No, Postgraduate </option>
                        <option value="Undergraduate"> No, Undergraduate </option>
                    </select>
                    <select type="text" name="graduationYear" class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('graduationYear') }}"> Graduation Year? Pls Select
                        </option>
                        <option value="2027"> 2027 </option>
                        <option value="2026"> 2026 </option>
                        <option value="2025"> 2025 </option>
                        <option value="2024"> 2024 </option>
                        <option value="2023"> 2023 </option>
                        <option value="2022"> 2022 </option>
                        <option value="2021"> 2021 </option>
                        <option value="2020"> 2020 </option>
                        <option value="2019"> 2019 </option>
                        <option value="2018"> 2018 </option>
                        <option value="2017"> 2017 </option>
                        <option value="2016"> 2016 </option>
                        <option value="2015"> 2015 </option>
                        <option value="2014"> 2014 </option>
                        <option value="2013"> 2013 </option>
                        <option value="2012"> 2012 </option>
                        <option value="2010"> 2010 </option>
                        <option value="2009"> 2009 </option>
                        <option value="2008"> 2008 </option>
                        <option value="2007"> 2007 </option>
                        <option value="2006"> 2006 </option>
                        <option value="2005"> 2005 </option>
                        <option value="2004"> 2004 </option>
                        <option value="2003"> 2003 </option>
                        <option value="2002"> 2002 </option>
                        <option value="2001"> 2001 </option>
                        <option value="2000"> 2000 </option>
                        <option value="1999"> 1999 </option>
                        <option value="1998"> 1998 </option>
                        <option value="1997"> 1997 </option>
                        <option value="1996"> 1996 </option>
                        <option value="1995"> 1995 </option>
                        <option value="1994"> 1994 </option>
                        <option value="1993"> 1993 </option>
                        <option value="1992"> 1992 </option>
                        <option value="1991"> 1991 </option>
                        <option value="1990"> 1990 </option>
                        <option value="1989"> 1989 </option>
                        <option value="1987"> 1987 </option>
                    </select>

                    <select type="text" name="unificationCurrentPost" class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('unificationCurrentPost') }}"> Current Post? Pls Select
                        </option>
                        <option value="1ST VICE CHAIRMAN"> 1ST VICE CHAIRMAN </option>
                        <option value="2ND VICE CHAIRMAN"> 2ND VICE CHAIRMAN </option>
                        <option value="APOSTOLATE/CHAIRMAN"> APOSTOLATE/CHAIRMAN </option>
                        <option value="ASSIST. ZONAL SUPERVISOR"> ASSIST. ZONAL SUPERVISOR </option>
                        <option value="ASSISTANT SECRETARY"> ASSISTANT SECRETARY </option>
                        <option value="CHOIR MASTER/MISTRESS"> CHOIR MASTER/MISTRESS </option>
                        <option value="DEPUTY GEN. SECRETARY"> DEPUTY GEN. SECRETARY </option>
                        <option value="DRAMA MINISTRY LEADER"> DRAMA MINISTRY LEADER </option>
                        <option value="EVANGELISM SECRETARY"> EVANGELISM SECRETARY </option>
                        <option value="FEMALE CO-ORDINATOR"> FEMALE CO-ORDINATOR </option>
                        <option value="FINANCIAL SECRETARY"> FINANCIAL SECRETARY </option>
                        <option value="GENERAL SECRETARY"> GENERAL SECRETARY </option>
                        <option value="LEVITE CO-ORDINATOR"> LEVITE CO-ORDINATOR </option>
                        <option value="PRAYER MINISTRY LEADER"> PRAYER MINISTRY LEADER </option>
                        <option value="PRESIDENT"> PRESIDENT </option>
                        <option value="PUBLICITY SECRETARY"> PUBLICITY SECRETARY </option>
                        <option value="SECRETARY"> SECRETARY </option>
                        <option value="STATE COORDINATOR"> STATE COORDINATOR </option>
                        <option value="TREASURY SECRETARY"> TREASURY SECRETARY </option>
                        <option value="VICE PRESIDENT"> VICE PRESIDENT </option>
                        <option value="WELFARE SECRETARY"> WELFARE SECRETARY </option>
                        <option value="ZONAL SUPERVISOR"> ZONAL SUPERVISOR </option>
                        <option value="OTHER"> OTHER </option>
                    </select>

                    <select class="shadow-none selectpicker with-border" name="unificationStatus">
                        <option selected disabled value="{{ old('unificationStatus') }}"> Fellowship Position? Pls
                            Select </option>
                        <option value="Member"> Member </option>
                        <option value="Guest"> Guest </option>
                        <option value="NYSC"> NYSC Member </option>
                        <option value="CEC"> CEC </option>
                        <option value="CWC"> CWC </option>
                        <option value="Steering Commitee"> Steering Commitee </option>
                    </select>

                    <select type="text" placeholder="Fellowship Name?" name="yourFellowship"
                        class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('yourFellowship') }}"> Fellowship Name? Pls Select
                        </option>
                        @foreach (App\Models\Institution::all() as $institution)
                        <option value="{{$institution->name}}">{{$institution->name}}</option>
                        @endforeach
                        <option value="{{ old('yourFellowship') }}"> {{ old('yourFellowship') }}</option>
                        <option value="Abraham Adesanya Polytechnic, Ijebu Igbo."> Abraham Adesanya
                            Polytechnic, Ijebu Igbo. </option>
                        <option value="Adekunle Ajasin University, Akungba"> Adekunle Ajasin University,
                            Akungba </option>
                        <option value="Adeniran Ogunsanya College of Education, Ijanikin"> Adeniran
                            Ogunsanya College of Education, Ijanikin </option>
                        <option value="Adeyemi College of Education, Ondo."> Adeyemi College of
                            Education, Ondo. </option>
                        <option value="College of Agricultural Technology, Igboora."> College of
                            Agricultural Technology, Igboora. </option>
                        <option value="College of Education, Ikere- Ekiti"> College of Education, Ikere-
                            Ekiti </option>
                        <option value="College of Education, Ilemona"> College of Education, Ilemona
                        </option>
                        <option value="College of Education, Ilesa"> College of Education, Ilesa
                        </option>
                        <option value="College of education, Ilorin"> College of education, Ilorin
                        </option>
                        <option value="College of Education, Minna"> College of Education, Minna
                        </option>
                        <option value="College of Education, Oro"> College of Education, Oro </option>
                        <option value="College of Education/University of Uyo, Ila Orangun"> College of
                            Education/University of Uyo, Ila Orangun </option>
                        <option value="College of Health Technology, Offa."> College of Health
                            Technology, Offa. </option>
                        <option value="Crown Polytechnic, Ado-Ekiti"> Crown Polytechnic, Ado-Ekiti
                        </option>
                        <option value="Ekiti State University, Ado Ekiti"> Ekiti State University, Ado
                            Ekiti </option>
                        <option value="Emmanuel Alayande College of Education, Lanlate"> Emmanuel
                            Alayande College of Education, Lanlate </option>
                        <option value="Emmanuel alayande College of Education, Oyo"> Emmanuel alayande
                            College of Education, Oyo </option>
                        <option value="Federal College of Education (Special), Oyo"> Federal College of
                            Education (Special), Oyo </option>
                        <option value="Federal College of Education (Technical), Akoka"> Federal College
                            of Education (Technical), Akoka </option>
                        <option value="Federal College of Education, Kotangora"> Federal College of
                            Education, Kotangora </option>
                        <option value="Federal College of Education, Osiele, Abeokuta"> Federal College
                            of Education, Osiele, Abeokuta </option>
                        <option value="Federal College of Education, Zuba-Abuja"> Federal College of
                            Education, Zuba-Abuja </option>
                        <option value="Federal College of Fisheries &amp; Fresh Water Management, New Bussa">
                            Federal College of Fisheries &amp; Fresh Water Management, New Bussa
                        </option>
                        <option value="Federal College of Fisheries &amp; Marine Technology, VI.">
                            Federal College of Fisheries &amp; Marine Technology, VI. </option>
                        <option value="Federal polytechnic Ilaro"> Federal polytechnic Ilaro </option>
                        <option value="Federal polytechnic Offa"> Federal polytechnic Offa </option>
                        <option value="Federal Polytechnic, Ado - Ekiti School of Part Time"> Federal
                            Polytechnic, Ado - Ekiti School of Part Time </option>
                        <option value="Federal Polytechnic, Bida"> Federal Polytechnic, Bida </option>
                        <option value="Federal Polytechnic, Ede."> Federal Polytechnic, Ede. </option>
                        <option value="Federal Polytechnic, Kaura Namoda"> Federal Polytechnic, Kaura
                            Namoda </option>
                        <option value="Federal School of Wildlife Management, New Bussa"> Federal School
                            of Wildlife Management, New Bussa </option>
                        <option value="Federal University of Agric, Abeokuta"> Federal University of
                            Agric, Abeokuta </option>
                        <option value="Federal University of Technology, Akure"> Federal University of
                            Technology, Akure </option>
                        <option value="Federal University of Technology, Minna"> Federal University of
                            Technology, Minna </option>
                        <option value="Federal University, Dustinma"> Federal University, Dustinma
                        </option>
                        <option value="Federal University, Lokoja"> Federal University, Lokoja </option>
                        <option value="Federal University, Oye-Ekiti"> Federal University, Oye-Ekiti
                        </option>
                        <option value="Houdegbe North american University, Cotonou"> Houdegbe North
                            american University, Cotonou </option>
                        <option value="Igbajo Polytechnic, Igbajo"> Igbajo Polytechnic, Igbajo </option>
                        <option value="Interlink, Ijebu Ijesa"> Interlink, Ijebu Ijesa </option>
                        <option value="Kogi state University, Anyigba"> Kogi state University, Anyigba
                        </option>
                        <option value="Kwara State Polytechnic"> Kwara State Polytechnic </option>
                        <option value="Kwara State University, Malete"> Kwara State University, Malete
                        </option>
                        <option value="Lagos State College of Health Tech"> Lagos State College of
                            Health Tech </option>
                        <option value="Lagos State Polytechnic Isolo/Ikorodu"> Lagos State Polytechnic
                            Isolo/Ikorodu </option>
                        <option value="Lagos State University, Epe"> Lagos State University, Epe
                        </option>
                        <option value="Lagos State University, Ojo"> Lagos State University, Ojo
                        </option>
                        <option value="Lagos University Teaching Hospital, Idi Araba"> Lagos University
                            Teaching Hospital, Idi Araba </option>
                        <option value="LAUTECH, Ogbomosho"> LAUTECH, Ogbomosho </option>
                        <option value="Michael Otedola College of Primary Education, Naforija, Epe">
                            Michael Otedola College of Primary Education, Naforija, Epe </option>
                        <option value="Moshood Abiola Polytechnic, Abeokuta"> Moshood Abiola
                            Polytechnic, Abeokuta </option>
                        <option value="National Open University of Nigeria, Ibadan Centre"> National
                            Open University of Nigeria, Ibadan Centre </option>
                        <option value="Niger State Polytechnic, Zungeru"> Niger State Polytechnic,
                            Zungeru </option>
                        <option value="Obafemi Awolowo University, Ile Ife."> Obafemi Awolowo
                            University, Ile Ife. </option>
                        <option value="Oduduwa University, Ipetumodu"> Oduduwa University, Ipetumodu
                        </option>
                        <option value="Ogun State (ICT) polytechnic, sapade"> Ogun State (ICT)
                            polytechnic, sapade </option>
                        <option value="Ogun State D.S Adegbenro ICT Polytechnic, Eruku, Itori - Ewekoro">
                            Ogun State D.S Adegbenro ICT Polytechnic, Eruku, Itori - Ewekoro </option>
                        <option value="Ogun State Institue of Technology, Igbesa"> Ogun State Institue
                            of Technology, Igbesa </option>
                        <option value="Ogun State Polytechnic,Satellite Campus, Tanke, Ilorin"> Ogun
                            State Polytechnic,Satellite Campus, Tanke, Ilorin </option>
                        <option value="Ogun state School of Health Technology, Ilese"> Ogun state School
                            of Health Technology, Ilese </option>
                        <option value="Olabisi Onabanjo University, Ago Iwoye"> Olabisi Onabanjo
                            University, Ago Iwoye </option>
                        <option value="Olabisi Onabanjo University, College of Agriculture, Ayetoro">
                            Olabisi Onabanjo University, College of Agriculture, Ayetoro </option>
                        <option value="Olabisi Onabanjo University, college of Medicine, Ikene"> Olabisi
                            Onabanjo University, college of Medicine, Ikene </option>
                        <option value="Ondo State School of Health Technology, Akure"> Ondo State School
                            of Health Technology, Akure </option>
                        <option value="Ondo State University of Science &amp; Technology Okitipupa">
                            Ondo State University of Science &amp; Technology Okitipupa </option>
                        <option value="Osun State College of Health Technology, Ilesa"> Osun State
                            College of Health Technology, Ilesa </option>
                        <option value="Osun State College of Technology, Esa Oke"> Osun State College of
                            Technology, Esa Oke </option>
                        <option value="Osun State Polytechnic, Iree."> Osun State Polytechnic, Iree.
                        </option>
                        <option value="Osun State University, Ikire Campus"> Osun State University,
                            Ikire Campus </option>
                        <option value="Osun State University, Ipetu-Ijesa Campus."> Osun State
                            University, Ipetu-Ijesa Campus. </option>
                        <option value="Osun State University, Okuku Campus"> Osun State University,
                            Okuku Campus </option>
                        <option value="Osun State University, Osogbo Campus"> Osun State University,
                            Osogbo Campus </option>
                        <option value="Porto-Novo Chapter"> Porto-Novo Chapter </option>
                        <option value="Rufus Giwa Polytechnic, Owo."> Rufus Giwa Polytechnic, Owo.
                        </option>
                        <option value="School of Agric, Akure"> School of Agric, Akure </option>
                        <option value="School of forestry, Jericho, Ibadan"> School of forestry,
                            Jericho, Ibadan </option>
                        <option value="School of Health Science Technology, Ijero-Ekiti"> School of
                            Health Science Technology, Ijero-Ekiti </option>
                        <option value="Tai Solarin College of Education, Omu."> Tai Solarin College of
                            Education, Omu. </option>
                        <option value="Tai Solarin University of Education,Ijagun, Ijebu Ode"> Tai
                            Solarin University of Education,Ijagun, Ijebu Ode </option>
                        <option value="The Ibarapa Polytechnic, Eruwa."> The Ibarapa Polytechnic, Eruwa.
                        </option>
                        <option value="The Okeogun Polytechnic, Saki"> The Okeogun Polytechnic, Saki
                        </option>
                        <option value="The Polytechnic, Ibadan"> The Polytechnic, Ibadan </option>
                        <option value="The Polytechnic, Ile Ife"> The Polytechnic, Ile Ife </option>
                        <option value="University of Abuja"> University of Abuja </option>
                        <option value="University of Ibadan"> University of Ibadan </option>
                        <option value="University of Ilorin, Ilorin"> University of Ilorin, Ilorin
                        </option>
                        <option value="University of Jos, Jos"> University of Jos, Jos </option>
                        <option value="University of Lagos"> University of Lagos </option>
                        <option value="Yaba College of Technology"> Yaba College of Technology </option>
                        <option value="Zenith University, Ghana"> Zenith University, Ghana </option>
                        </select>
                    </select>

                    <select type="text" placeholder="Fellowship Name?" name="fellowshipsStatecountry"
                        class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('fellowshipsStatecountry') }}"> Fellowship State? Pls Select
                        </option>
                        @foreach (App\Models\Institution::all() as $institution)
                        <option value="{{$institution->state}}">{{$institution->state}}</option>
                        @endforeach
                        <option value="ABIA"> ABIA </option>
                        <option value="ADAMAWA"> ADAMAWA </option>
                        <option value="AKWA IBOM"> AKWA IBOM </option>
                        <option value="ANAMBRA"> ANAMBRA </option>
                        <option value="BAUCHI"> BAUCHI </option>
                        <option value="BAYELSA"> BAYELSA </option>
                        <option value="BENUE"> BENUE </option>
                        <option value="BORNO"> BORNO </option>
                        <option value="CROSS RIVER"> CROSS RIVER </option>
                        <option value="DELTA"> DELTA </option>
                        <option value="EBONYI"> EBONYI </option>
                        <option value="EDO"> EDO </option>
                        <option value="EKITI"> EKITI </option>
                        <option value="ENUGU"> ENUGU </option>
                        <option value="GOMBE"> GOMBE </option>
                        <option value="IMO"> IMO </option>
                        <option value="GIGAWA"> GIGAWA </option>
                        <option value="KADUNA"> KADUNA </option>
                        <option value="KANO"> KANO </option>
                        <option value="KATSINA"> KATSINA </option>
                        <option value="KEBBI"> KEBBI </option>
                        <option value="KOGI"> KOGI </option>
                        <option value="KWARA"> KWARA </option>
                        <option value="LAGOS"> LAGOS </option>
                        <option value="NASSARAWA"> NASSARAWA </option>
                        <option value="NIGER"> NIGER </option>
                        <option value="OGUN"> OGUN </option>
                        <option value="ONDO"> ONDO </option>
                        <option value="OSUN"> OSUN </option>
                        <option value="OYO"> OYO </option>
                        <option value="PLATEAU"> PLATEAU </option>
                        <option value="RIVERS"> RIVERS </option>
                        <option value="SOKOTO"> SOKOTO </option>
                        <option value="TARABA"> TARABA </option>
                        <option value="YOBE"> YOBE </option>
                        <option value="ZAMFARA"> ZAMFARA </option>
                        <option value="FCT"> FCT </option>
                        <option value="REPUBLIC OF BENIN"> REPUBLIC OF BENIN </option>
                        <option value="GHANA"> GHANA </option>
                        <option value="OTHER"> OTHER </option>
                    </select>

                    <select type="text" placeholder="Graduate ?" name="levelInSchool"
                        class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('levelInSchool') }}"> Level? Pls Select </option>
                        <option value="100 Level"> 100 Level</option>
                        <option value="200 Level"> 200 Level</option>
                        <option value="300 Level"> 300 Level</option>
                        <option value="400 Level"> 400 Level</option>
                        <option value="500 Level"> 500 Level</option>
                        <option value="600 Level"> 600 Level</option>
                        <option value="HND1"> HND1 </option>
                        <option value="HND2"> HND2 </option>
                        <option value="ND1"> ND1 </option>
                        <option value="ND2"> ND2 </option>
                        <option value="Graduate"> Graduate </option>
                        <option value="Pre-Degree"> Pre-Degree </option>
                        <option value="Pre-ND"> Pre-ND </option>
                        <option value="Post Graduate"> Post Graduate </option>
                    </select>
                    <select type="text" placeholder="First Degree Qualification?" name="qualification_one"
                        class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('qualification_one') }}"> First Degree Qualification?
                            Pls Select </option>
                        <option value="BSc"> BSc </option>
                        <option value="HND"> HND </option>
                        <option value="MBBS"> MBBS </option>
                        <option value="BDS"> BDS </option>
                        <option value="BchD"> BchD </option>
                        <option value="MSc"> MSc </option>
                        <option value="OND"> OND </option>
                        <option value="PhD"> PhD </option>
                        <option value="PGD"> PGD </option>
                        <option value="Diploma"> Diploma </option>
                        <option value="SSCE"> SSCE </option>
                    </select>
                    <select type="text" placeholder="Fellowship Post?" name="positionHeld"
                        class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('positionHeld') }}"> Fellowship Post? Pls Select
                        </option>
                        <option value="ASSISTANT SECRETARY"> ASSISTANT SECRETARY </option>
                        <option value="CHOIR MASTER/MISTRESS"> CHOIR MASTER/MISTRESS </option>
                        <option value="EVANGELISM SECRETARY"> EVANGELISM SECRETARY </option>
                        <option value="FEMALE CO-ORDINATOR"> FEMALE CO-ORDINATOR </option>
                        <option value="FINANCIAL SECRETARY"> FINANCIAL SECRETARY </option>
                        <option value="LEVITE CO-ORDINATOR"> LEVITE CO-ORDINATOR </option>
                        <option value="PRAYER MINISTRY LEADER"> PRAYER MINISTRY LEADER </option>
                        <option value="PRESIDENT"> PRESIDENT </option>
                        <option value="PUBLICITY SECRETARY"> PUBLICITY SECRETARY </option>
                        <option value="SECRETARY"> SECRETARY </option>
                        <option value="TREASURY SECRETARY"> TREASURY SECRETARY </option>
                        <option value="VICE PRESIDENT"> VICE PRESIDENT </option>
                        <option value="WELFARE SECRETARY"> WELFARE SECRETARY </option>
                        <option value="MEMBER"> MEMBER </option>
                        <option value="OTHERS"> OTHERS </option>
                    </select>


                    <select type="text" placeholder="Fellowship Name?" name="unit_in_fellowship"
                        class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('unit_in_fellowship') }}"> Unit in Fellowship? Pls
                            Select </option>
                        <option value="Drama Unit"> Drama Unit </option>
                        <option value="Choir Unit"> Choir Unit </option>
                        <option value="Decorating Unit"> Decorating Unit </option>
                        <option value="Usering Unit"> Usering Unit </option>
                        <option value="Levites Unit"> Levites Unit </option>
                        <option value="Prayer Unit"> Prayer Unit </option>
                        <option value="Bible Unit"> Bible Unit </option>
                        <option value="Evangelism Unit"> Evangelism Unit </option>
                        <option value="Academic Unit"> Academic Unit </option>
                        <option value="Media/Publicity Unit"> Media/Publicity Unit </option>
                        <option value="OTHER"> OTHERS </option>
                    </select>
                    <select type="text" placeholder="First Degree Qualification?" name="qualification_one"
                        class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('qualification_one') }}"> First Degree Qualification?
                            Pls Select </option>
                        <option value="BSc"> BSc </option>
                        <option value="HND"> HND </option>
                        <option value="MBBS"> MBBS </option>
                        <option value="BDS"> BDS </option>
                        <option value="BchD"> BchD </option>
                        <option value="MSc"> MSc </option>
                        <option value="OND"> OND </option>
                        <option value="PhD"> PhD </option>
                        <option value="PGD"> PGD </option>
                        <option value="Diploma"> Diploma </option>
                        <option value="SSCE"> SSCE </option>
                    </select>
                    <input type="text" placeholder="First Degree Institution" value="{{ old('degree_one') }}" name="degree_one" class="with-border">
                    <input type="text" placeholder="First Degree Course Of Study" value="{{ old('course_one') }}" name="course_one" class="with-border">

                    <select type="text" placeholder="Second Degree Qualification?" name="qualification"
                        class="shadow-none selectpicker with-border">
                        <option selected disabled value="{{ old('qualification') }}"> Highest Qualification?
                            Pls Select </option>
                        <option value="BSc"> BSc </option>
                        <option value="HND"> HND </option>
                        <option value="MBBS"> MBBS </option>
                        <option value="BDS"> BDS </option>
                        <option value="BchD"> BchD </option>
                        <option value="MSc"> MSc </option>
                        <option value="OND"> OND </option>
                        <option value="PhD"> PhD </option>
                        <option value="PGD"> PGD </option>
                        <option value="Diploma"> Diploma </option>
                        <option value="SSCE"> SSCE </option>
                    </select>

                    <input type="file" placeholder="Profile Photo"  uk-tooltip="Profile Photo" class="form-control with-border" accept="image/*" name="profile_image" />
                    <div class="flex items-center justify-end mt-6">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('convention.payment') }}">
                            {{ __('Already registered? Make Payment Now') }}
                        </a>

                        <x-jet-button class="ml-5">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                    {{-- <div class="md:col-span-2 md:flex items-center justify-between">
                        <button type='submit' name="submit" class="button bg-blue-700 w-full md:w-auto md:mt-0 mt-4">
                            Reserve My Seat</button>

                        <a href="{{url('payment')}}" class="button bg-dark-700 w-full md:w-auto md:mt-0 mt-4">Already
                            Registered?
                            &nbsp; <b> Pay Now</b></a>
                    </div> --}}
                </div>
            <form>
        </div>
    </div>
</div>
@endsection
