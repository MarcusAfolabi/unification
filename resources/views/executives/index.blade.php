@extends('layouts.main')
@section('title', 'Meet the Central Executives Council')
@section('description', 'This is all CEC, read their profile below')
@section('keywords', 'Executives, Position, President, Speech')
@section('canonical', 'https://cnsunification.org/executives')

@section('main')
@auth
@if (auth()->user()->isAdmin())

<div class="main_content">
    <div class="mcontainer">
        <div class="flex justify-between items-center relative md:mb-4 mb-3">
            <div class="flex-1">
                <h5 class="text-1xl font-semibold">
                    <a href="{{ route('executives.create') }}"><i class="icon-material-outline-add"></i> New Exective
                    </a>
                </h5>
            </div>
        </div>
        @if (session('status'))
        <p class="bg-green-500 text-white text-center border p-4 relative rounded-md uk-alert">
            {{ session('status') }}</p>
        @endif
        <div class="card">
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search"><i class="uil-search-alt"></i>
                <form action="">
                    <input type="text" class="form-control" name="executive"
                        placeholder="Search for Names, Position and more.." autocomplete="off">
                </form>
            </div>
            <hr>
            <br>
            @if ($executives->count() > 0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b bg-gray-50">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            S/No</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            FirstName</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Image</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Email</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Hobbies</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Position Held</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Edit</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($executives as $key => $executive)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{
                                            ++$key}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('executives.index') }}">
                                                {{ $executive->name }} </a>
                                        </td>
                                        <th class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a
                                                href="{{ asset($executive->image) }}"> <img
                                                    src="{{ asset($executive->image) }}" alt="{{ $executive->name }}"
                                                    class="rounded-lg" style="max-height: 50px; max-width:50px"
                                                    srcset=""></a></th>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="mailto:{{ $executive->email }}">{{ $executive->email }}</a>
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $executive->hobby }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{
                                            $executive->position }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"> <a
                                                href="{{ route('executives.edit', $executive) }}"> <span
                                                    class="icon-feather-edit "></span></a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="{{ route('executives.destroy', $executive) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    onclick="return confirm('Hey, Are you sure about this?');">
                                                    <span class="icon-feather-trash-2"></span> </button>

                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-center text-opacity-75"> Nobody has showed up</p>
                        @endif

                    </div>
                    {{ $executives->links() }}
                    @endif
                    @if (!auth()->user()->isAdmin())
                    <div class="w-full lg:h-80 h-52 pb-10 bg-cover flex justify-center items-center relative"
                        data-src="{{ asset('assets/images/group/group-cover-1.jpg') }}" uk-img>

                        <div class="text-center max-w-xl mx-auto z-10 relative">
                            <div class="lg:text-4xl text-2xl text text-white font-semibold mb-3"> About Unification
                                Campus
                                Fellowship</div>
                            <div class="text-white text-lg font-medium text-opacity-90"> Remember now thy Creator in the
                                days of
                                thy youth, while the evil days come not, nor the years draw nigh, when thou shalt say, I
                                have no
                                pleasure in them.
                                <br> Ecclesiastes 12:1
                            </div>
                        </div>

                        <div class="absolute w-full h-full inset-0 bg-gray-600 bg-opacity-20"> </div>
                    </div>

                    <div class="mcontainer">
                        <div class="-mt-16 bg-white max-w-3xl mx-auto p-10 relative rounded-md shadow">

                            <div class="md:space-y-6 space-y-5 text-gray-400 md:text-base">

                                <div class="font-semibold md:text-2xl text-lg text-gray-700">About Isokan </div>
                                <div>

                                    <div class="md:flex md:space-x-14">
                                        <div class="md:w-4/4">
                                            <h2 class="text-xl font-semibold mb-2" id="basic"> </h2>
                                            <p class="text-base mb-10"> We the entire members of Cherubim and Seraphim
                                                Church
                                                unification Campus Fellowship with our Foundation Campus Fellowship at
                                                Obafemi
                                                Awolowo University, Ile-Ife and National Headquarters in Lagos, herein
                                                referred
                                                to as the “Cherubim and Seraphim Church” having realized the abundant
                                                grace of
                                                our Lord Jesus Christ in the communion of the saints in Cherubim and
                                                Seraphim (C
                                                & S) Church and the great work needed within the Church to maintain this
                                                grace
                                                and having taken cognizance of the Divine Covenant the Lord made with
                                                ST. MOSES ORIMOLADE
                                                TUNOLASE, this day make for ourselves and those that come after us this
                                                God
                                                inspired constitution to guide us in our fellowships and teaching of
                                                God’s word
                                                leaving aside all evil works of men and doctrinal differences to worship
                                                our God
                                                under one Lord, one Shepherd, one Baptism and one Faith. May God so help
                                                us.



                                            </p>

                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> NAME </div>
                                            <div class="md:leading-8">The Church shall be named, called and addressed
                                                as:
                                                Cherubim and Seraphim Church Unification Campus Fellowship.
                                            </div>
                                            <br>
                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> FOUNDATION
                                            </div>
                                            <div class="md:leading-8">The foundation of this Church is laid on Christ
                                                Jesus, the Author and Finisher of our faith.
                                            </div>
                                            <br>
                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> TENETS OF
                                                FAITH, DOCTRINES, NORMS AND PRACTICES </div>
                                            <div class="md:leading-8">Tenets of Faith, Doctrines, Norms and Practices of
                                                the Church shall be in line with the Scriptures. They are as
                                                specifically outlined in the Article of Faith and Worship, which shall
                                                be an appendix of this constitution.
                                            </div>
                                            <br>
                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> MOTTO </div>
                                            <div class="md:leading-8">The motto of the church shall be: “REMEMBER YOUR
                                                CREATOR IN THE DAYS OF YOUR YOUTH” Eccl. 12:1.
                                            </div>
                                            <br>
                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> COVENANT SONG
                                                C&S HYMN NO 803 || STANZA 3 || In Yoruba and English</div>

                                            <div class="md:leading-8 italic">Jo maje ki fitila egbe yi ku || Quench not
                                                thy light forever in this order
                                                <br> jo mase je k’ ota le ri gbe se || Never allow the foes to draw us
                                                back
                                                <br> jo tun gbogbo ibaje inu re se || Remove the filthiness in every
                                                corner
                                                <br> je ko gbile nu’ fe oun’ wa mimo || Establish us forever and ever
                                                more
                                            </div>
                                            <br>
                                            <br>
                                            <hr>
                                            <div class="font-semibold md:text-2xl text-lg text-gray-700">The Central
                                                Executives </div>
                                            <hr>
                                            <br>

                                            @if ($executives->count() > 0)

                                            <ul uk-accordion>
                                                @foreach ($excos as $exco )
                                                <li class="uk-open">
                                                    <a class="uk-accordion-title" href="#">{{ $exco->position }}</a>
                                                    <div class="uk-accordion-content">
                                                        <div
                                                            class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                                                            <img src="{{ asset($exco->image) }}" alt="{{ $exco->name }}"
                                                                class="w-full h-full absolute inset-0 object-cover">
                                                        </div>
                                                        <p>Name: </p>
                                                        <div class="font-semibold md:text-xl text-lg text-gray-700"> {{
                                                            $exco->name }} </div>
                                                        <p>Hobby: </p>
                                                        <div class="font-semibold md:text-xl text-lg text-gray-700"> {{
                                                            $exco->hobby }} </div>
                                                        <p>Email: </p>
                                                        <div class="font-semibold md:text-xl text-lg text-gray-700"> {{
                                                            $exco->email }} </div>

                                                        <hr>
                                                        <p class="md:w-4/4"><b>Profile:</b> {!! $exco->profile !!}</p>
                                                    </div>
                                                </li>
                                                @endforeach


                                            </ul>
                                            @else
                                            <p class="text-center text-opacity-75"> Nothing Here!</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    @endif
                    @endauth


                    @guest
                    <div class="w-full lg:h-80 h-52 pb-10 bg-cover flex justify-center items-center relative"
                        data-src="{{ asset('assets/images/group/group-cover-1.jpg') }}" uk-img>

                        <div class="text-center max-w-xl mx-auto z-10 relative">
                            <div class="lg:text-4xl text-2xl text text-white font-semibold mb-3"> About Unification
                                Campus
                                Fellowship</div>
                            <div class="text-white text-lg font-medium text-opacity-90"> Remember now thy Creator in the
                                days of
                                thy youth, while the evil days come not, nor the years draw nigh, when thou shalt say, I
                                have no
                                pleasure in them.
                                <br> Ecclesiastes 12:1
                            </div>
                        </div>

                        <div class="absolute w-full h-full inset-0 bg-gray-600 bg-opacity-20"> </div>
                    </div>

                    <div class="mcontainer">
                        <div class="-mt-16 bg-white max-w-3xl mx-auto p-10 relative rounded-md shadow">

                            <div class="md:space-y-6 space-y-5 text-gray-400 md:text-base">

                                <div class="font-semibold md:text-2xl text-lg text-gray-700">About Isokan </div>
                                <div>

                                    <div class="md:flex md:space-x-14">
                                        <div class="md:w-4/4">
                                            <h2 class="text-xl font-semibold mb-2" id="basic"> </h2>
                                            <p class="text-base mb-10"> We the entire members of Cherubim and Seraphim
                                                Church
                                                unification Campus Fellowship with our Foundation Campus Fellowship at
                                                Obafemi
                                                Awolowo University, Ile-Ife and National Headquarters in Lagos, herein
                                                referred
                                                to as the “Cherubim and Seraphim Church” having realized the abundant
                                                grace of
                                                our Lord Jesus Christ in the communion of the saints in Cherubim and
                                                Seraphim (C
                                                & S) Church and the great work needed within the Church to maintain this
                                                grace
                                                and having taken cognizance of the Divine Covenant the Lord made with
                                                ST. MOSES ORIMOLADE
                                                TUNOLASE, this day make for ourselves and those that come after us this
                                                God
                                                inspired constitution to guide us in our fellowships and teaching of
                                                God’s word
                                                leaving aside all evil works of men and doctrinal differences to worship
                                                our God
                                                under one Lord, one Shepherd, one Baptism and one Faith. May God so help
                                                us.



                                            </p>

                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> NAME </div>
                                            <div class="md:leading-8">The Church shall be named, called and addressed
                                                as:
                                                Cherubim and Seraphim Church Unification Campus Fellowship.
                                            </div>
                                            <br>
                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> FOUNDATION
                                            </div>
                                            <div class="md:leading-8">The foundation of this Church is laid on Christ
                                                Jesus, the Author and Finisher of our faith.
                                            </div>
                                            <br>
                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> TENETS OF
                                                FAITH, DOCTRINES, NORMS AND PRACTICES </div>
                                            <div class="md:leading-8">Tenets of Faith, Doctrines, Norms and Practices of
                                                the Church shall be in line with the Scriptures. They are as
                                                specifically outlined in the Article of Faith and Worship, which shall
                                                be an appendix of this constitution.
                                            </div>
                                            <br>
                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> MOTTO </div>
                                            <div class="md:leading-8">The motto of the church shall be: “REMEMBER YOUR
                                                CREATOR IN THE DAYS OF YOUR YOUTH” Eccl. 12:1.
                                            </div>
                                            <br>
                                            <div class="font-semibold md:text-xl text-lg text-gray-700"> COVENANT SONG
                                                C&S HYMN NO 803 || STANZA 3 || In Yoruba and English</div>

                                            <div class="md:leading-8 italic">Jo maje ki fitila egbe yi ku || Quench not
                                                thy light forever in this order
                                                <br> jo mase je k’ ota le ri gbe se || Never allow the foes to draw us
                                                back
                                                <br> jo tun gbogbo ibaje inu re se || Remove the filthiness in every
                                                corner
                                                <br> je ko gbile nu’ fe oun’ wa mimo || Establish us forever and ever
                                                more
                                            </div>
                                            <br>
                                            <br>
                                            <hr>
                                            <div class="font-semibold md:text-2xl text-lg text-gray-700">The Central
                                                Executives </div>
                                            <hr>
                                            <br>

                                            @if ($executives->count() > 0)

                                            <ul uk-accordion>
                                                @foreach ($excos as $exco )
                                                <li class="uk-open">
                                                    <a class="uk-accordion-title" href="#">{{ $exco->position }}</a>
                                                    <div class="uk-accordion-content">
                                                        <div
                                                            class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                                                            <img src="{{ asset($exco->image) }}" alt="{{ $exco->name }}"
                                                                class="w-full h-full absolute inset-0 object-cover">
                                                        </div>
                                                        <p>Name: </p>
                                                        <div class="font-semibold md:text-xl text-lg text-gray-700"> {{
                                                            $exco->name }} </div>
                                                        <p>Hobby: </p>
                                                        <div class="font-semibold md:text-xl text-lg text-gray-700"> {{
                                                            $exco->hobby }} </div>
                                                        <p>Email: </p>
                                                        <div class="font-semibold md:text-xl text-lg text-gray-700"> {{
                                                            $exco->email }} </div>

                                                        <hr>
                                                        <p class="md:w-4/4"><b>Profile:</b> {!! $exco->profile !!}</p>
                                                    </div>
                                                </li>
                                                @endforeach


                                            </ul>
                                            @else
                                            <p class="text-center text-opacity-75"> Nothing Here!</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    @endguest
                </div>
                @endsection