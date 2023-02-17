@extends('admin.admin_master')

@section('admin')

  <!-- CSS Files -->
  {{--  <link id="pagestyle" href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/argon-dashboard.min.css?v=1.0.0" rel="stylesheet" />  --}}



@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
  <span class="alert-text"><strong>Success!</strong>   {{ session('success') }}</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
  <span class="alert-text"><strong>{{ $error }}</strong> </span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endforeach
@endif

<div class="col">




  {{--  <div class="row min-vh-80">
    <div class="col-lg-8 col-md-12 mx-auto">
      <div class="places-sweet-alerts mt-2">
        <h2 class="text-center text-white">Sweet Alert</h2>
        <p class="text-center text-white">A beautiful plugin, that replace the classic alert, Handcrafted by our friend <a target="_blank" class="text-white font-weight-bold" href="https://twitter.com/t4t5">Tristan Edwards</a>. Please check out the <a class="text-white font-weight-bold" href="https://sweetalert2.github.io/" target="_blank">full documentation.</a></p>
      </div>
      <div class="row mt-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Basic example</p>
              <button class="btn btn-primary mb-0" onclick="argon.showSwal('basic')">Try me!</button>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">A success message</p>
              <button class="btn btn-primary mb-0" onclick="argon.showSwal('success-message')">Try me!</button>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Custom HTML description</p>
              <button class="btn btn-primary mb-0" onclick="argon.showSwal('custom-html')">Try me!</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Gitgub avatar request</p>
              <button class="btn btn-primary mb-0" onclick="argon.showSwal('input-field')">Try me!</button>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">A title with a text under</p>
              <button class="btn btn-primary mb-0" onclick="argon.showSwal('title-and-text')">Try me!</button>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">A message with auto close</p>
              <button class="btn btn-primary mb-0" onclick="argon.showSwal('auto-close')">Try me!</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4 mb-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">A warning message, with a function attached to the "Confirm" Button...</p>
              <button class="btn btn-primary mb-0" onclick="argon.showSwal('warning-message-and-confirmation')">Try me!</button>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">...and by passing a parameter, you can execute something else for "Cancel"</p>
              <button class="btn btn-primary mb-0" onclick="argon.showSwal('warning-message-and-cancel')">Try me!</button>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card">
            <div class="card-body text-center">
              <p class="card-text">Right-to-left support for Arabic, Persian, Hebrew, and other RTL languages</p>
              <button class="btn btn-primary mb-0" onclick="argon.showSwal('rtl-language')">Try me!</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  --}}






  {{--  <div class="card mt-4" id="basic-info">
    <div class="card-header">
      <h5>Basic Info</h5>
    </div>
    <div class="card-body pt-0">
      <div class="row">
        <div class="col-6">
          <label class="form-label">First Name</label>
          <div class="input-group">
            <input id="firstName" name="firstName" class="form-control" type="text" placeholder="Alec" required="required" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
        </div>
        <div class="col-6">
          <label class="form-label">Last Name</label>
          <div class="input-group">
            <input id="lastName" name="lastName" class="form-control" type="text" placeholder="Thompson" required="required" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-6">
          <label class="form-label mt-4">I'm</label>
          <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-gender" id="choices-gender" hidden="" tabindex="-1" data-choice="active"><option value="Male">Male</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="3" data-value="Male" data-custom-properties="null" aria-selected="true">Male</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder="" aria-activedescendant="choices--choices-gender-item-choice-1"><div class="choices__list" role="listbox"><div id="choices--choices-gender-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="Female" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Female</div><div id="choices--choices-gender-item-choice-2" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Male" data-select-text="Press to select" data-choice-selectable="">Male</div></div></div></div>
        </div>
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm-5 col-5">
              <label class="form-label mt-4">Birth Date</label>
              <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-month" id="choices-month" hidden="" tabindex="-1" data-choice="active"><option value="2">February</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="2" data-custom-properties="null" aria-selected="true">February</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder="" aria-activedescendant="choices--choices-month-item-choice-4"><div class="choices__list" role="listbox"><div id="choices--choices-month-item-choice-4" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="4" data-value="2" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">February</div></div></div></div>
            </div>
            <div class="col-sm-4 col-3">
              <label class="form-label mt-4">&nbsp;</label>
              <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-day" id="choices-day" hidden="" tabindex="-1" data-choice="active"><option value="1">1</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="1" data-custom-properties="null" aria-selected="true">1</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder=""><div class="choices__list" role="listbox"><div id="choices--choices-day-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="1" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">1</div><div id="choices--choices-day-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="2" data-select-text="Press to select" data-choice-selectable="">2</div><div id="choices--choices-day-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="3" data-select-text="Press to select" data-choice-selectable="">3</div><div id="choices--choices-day-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="4" data-select-text="Press to select" data-choice-selectable="">4</div><div id="choices--choices-day-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="5" data-select-text="Press to select" data-choice-selectable="">5</div><div id="choices--choices-day-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="6" data-select-text="Press to select" data-choice-selectable="">6</div><div id="choices--choices-day-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="7" data-select-text="Press to select" data-choice-selectable="">7</div><div id="choices--choices-day-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="8" data-select-text="Press to select" data-choice-selectable="">8</div><div id="choices--choices-day-item-choice-9" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="9" data-value="9" data-select-text="Press to select" data-choice-selectable="">9</div><div id="choices--choices-day-item-choice-10" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="10" data-value="10" data-select-text="Press to select" data-choice-selectable="">10</div><div id="choices--choices-day-item-choice-11" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="11" data-value="11" data-select-text="Press to select" data-choice-selectable="">11</div><div id="choices--choices-day-item-choice-12" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="12" data-value="12" data-select-text="Press to select" data-choice-selectable="">12</div><div id="choices--choices-day-item-choice-13" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="13" data-value="13" data-select-text="Press to select" data-choice-selectable="">13</div><div id="choices--choices-day-item-choice-14" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="14" data-value="14" data-select-text="Press to select" data-choice-selectable="">14</div><div id="choices--choices-day-item-choice-15" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="15" data-value="15" data-select-text="Press to select" data-choice-selectable="">15</div><div id="choices--choices-day-item-choice-16" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="16" data-value="16" data-select-text="Press to select" data-choice-selectable="">16</div><div id="choices--choices-day-item-choice-17" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="17" data-value="17" data-select-text="Press to select" data-choice-selectable="">17</div><div id="choices--choices-day-item-choice-18" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="18" data-value="18" data-select-text="Press to select" data-choice-selectable="">18</div><div id="choices--choices-day-item-choice-19" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="19" data-value="19" data-select-text="Press to select" data-choice-selectable="">19</div><div id="choices--choices-day-item-choice-20" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="20" data-value="20" data-select-text="Press to select" data-choice-selectable="">20</div><div id="choices--choices-day-item-choice-21" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="21" data-value="21" data-select-text="Press to select" data-choice-selectable="">21</div><div id="choices--choices-day-item-choice-22" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="22" data-value="22" data-select-text="Press to select" data-choice-selectable="">22</div><div id="choices--choices-day-item-choice-23" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="23" data-value="23" data-select-text="Press to select" data-choice-selectable="">23</div><div id="choices--choices-day-item-choice-24" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="24" data-value="24" data-select-text="Press to select" data-choice-selectable="">24</div><div id="choices--choices-day-item-choice-25" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="25" data-value="25" data-select-text="Press to select" data-choice-selectable="">25</div><div id="choices--choices-day-item-choice-26" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="26" data-value="26" data-select-text="Press to select" data-choice-selectable="">26</div><div id="choices--choices-day-item-choice-27" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="27" data-value="27" data-select-text="Press to select" data-choice-selectable="">27</div><div id="choices--choices-day-item-choice-28" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="28" data-value="28" data-select-text="Press to select" data-choice-selectable="">28</div><div id="choices--choices-day-item-choice-29" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="29" data-value="29" data-select-text="Press to select" data-choice-selectable="">29</div><div id="choices--choices-day-item-choice-30" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="30" data-value="30" data-select-text="Press to select" data-choice-selectable="">30</div><div id="choices--choices-day-item-choice-31" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="31" data-value="31" data-select-text="Press to select" data-choice-selectable="">31</div></div></div></div>
            </div>
            <div class="col-sm-3 col-4">
              <label class="form-label mt-4">&nbsp;</label>
              <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-year" id="choices-year" hidden="" tabindex="-1" data-choice="active"><option value="2020">2020</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="2020" data-custom-properties="null" aria-selected="true">2020</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder=""><div class="choices__list" role="listbox"><div id="choices--choices-year-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="1900" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">1900</div><div id="choices--choices-year-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="1901" data-select-text="Press to select" data-choice-selectable="">1901</div><div id="choices--choices-year-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="1902" data-select-text="Press to select" data-choice-selectable="">1902</div><div id="choices--choices-year-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="1903" data-select-text="Press to select" data-choice-selectable="">1903</div><div id="choices--choices-year-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="1904" data-select-text="Press to select" data-choice-selectable="">1904</div><div id="choices--choices-year-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="1905" data-select-text="Press to select" data-choice-selectable="">1905</div><div id="choices--choices-year-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="1906" data-select-text="Press to select" data-choice-selectable="">1906</div><div id="choices--choices-year-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="1907" data-select-text="Press to select" data-choice-selectable="">1907</div><div id="choices--choices-year-item-choice-9" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="9" data-value="1908" data-select-text="Press to select" data-choice-selectable="">1908</div><div id="choices--choices-year-item-choice-10" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="10" data-value="1909" data-select-text="Press to select" data-choice-selectable="">1909</div><div id="choices--choices-year-item-choice-11" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="11" data-value="1910" data-select-text="Press to select" data-choice-selectable="">1910</div><div id="choices--choices-year-item-choice-12" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="12" data-value="1911" data-select-text="Press to select" data-choice-selectable="">1911</div><div id="choices--choices-year-item-choice-13" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="13" data-value="1912" data-select-text="Press to select" data-choice-selectable="">1912</div><div id="choices--choices-year-item-choice-14" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="14" data-value="1913" data-select-text="Press to select" data-choice-selectable="">1913</div><div id="choices--choices-year-item-choice-15" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="15" data-value="1914" data-select-text="Press to select" data-choice-selectable="">1914</div><div id="choices--choices-year-item-choice-16" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="16" data-value="1915" data-select-text="Press to select" data-choice-selectable="">1915</div><div id="choices--choices-year-item-choice-17" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="17" data-value="1916" data-select-text="Press to select" data-choice-selectable="">1916</div><div id="choices--choices-year-item-choice-18" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="18" data-value="1917" data-select-text="Press to select" data-choice-selectable="">1917</div><div id="choices--choices-year-item-choice-19" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="19" data-value="1918" data-select-text="Press to select" data-choice-selectable="">1918</div><div id="choices--choices-year-item-choice-20" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="20" data-value="1919" data-select-text="Press to select" data-choice-selectable="">1919</div><div id="choices--choices-year-item-choice-21" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="21" data-value="1920" data-select-text="Press to select" data-choice-selectable="">1920</div><div id="choices--choices-year-item-choice-22" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="22" data-value="1921" data-select-text="Press to select" data-choice-selectable="">1921</div><div id="choices--choices-year-item-choice-23" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="23" data-value="1922" data-select-text="Press to select" data-choice-selectable="">1922</div><div id="choices--choices-year-item-choice-24" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="24" data-value="1923" data-select-text="Press to select" data-choice-selectable="">1923</div><div id="choices--choices-year-item-choice-25" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="25" data-value="1924" data-select-text="Press to select" data-choice-selectable="">1924</div><div id="choices--choices-year-item-choice-26" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="26" data-value="1925" data-select-text="Press to select" data-choice-selectable="">1925</div><div id="choices--choices-year-item-choice-27" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="27" data-value="1926" data-select-text="Press to select" data-choice-selectable="">1926</div><div id="choices--choices-year-item-choice-28" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="28" data-value="1927" data-select-text="Press to select" data-choice-selectable="">1927</div><div id="choices--choices-year-item-choice-29" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="29" data-value="1928" data-select-text="Press to select" data-choice-selectable="">1928</div><div id="choices--choices-year-item-choice-30" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="30" data-value="1929" data-select-text="Press to select" data-choice-selectable="">1929</div><div id="choices--choices-year-item-choice-31" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="31" data-value="1930" data-select-text="Press to select" data-choice-selectable="">1930</div><div id="choices--choices-year-item-choice-32" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="32" data-value="1931" data-select-text="Press to select" data-choice-selectable="">1931</div><div id="choices--choices-year-item-choice-33" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="33" data-value="1932" data-select-text="Press to select" data-choice-selectable="">1932</div><div id="choices--choices-year-item-choice-34" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="34" data-value="1933" data-select-text="Press to select" data-choice-selectable="">1933</div><div id="choices--choices-year-item-choice-35" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="35" data-value="1934" data-select-text="Press to select" data-choice-selectable="">1934</div><div id="choices--choices-year-item-choice-36" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="36" data-value="1935" data-select-text="Press to select" data-choice-selectable="">1935</div><div id="choices--choices-year-item-choice-37" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="37" data-value="1936" data-select-text="Press to select" data-choice-selectable="">1936</div><div id="choices--choices-year-item-choice-38" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="38" data-value="1937" data-select-text="Press to select" data-choice-selectable="">1937</div><div id="choices--choices-year-item-choice-39" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="39" data-value="1938" data-select-text="Press to select" data-choice-selectable="">1938</div><div id="choices--choices-year-item-choice-40" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="40" data-value="1939" data-select-text="Press to select" data-choice-selectable="">1939</div><div id="choices--choices-year-item-choice-41" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="41" data-value="1940" data-select-text="Press to select" data-choice-selectable="">1940</div><div id="choices--choices-year-item-choice-42" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="42" data-value="1941" data-select-text="Press to select" data-choice-selectable="">1941</div><div id="choices--choices-year-item-choice-43" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="43" data-value="1942" data-select-text="Press to select" data-choice-selectable="">1942</div><div id="choices--choices-year-item-choice-44" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="44" data-value="1943" data-select-text="Press to select" data-choice-selectable="">1943</div><div id="choices--choices-year-item-choice-45" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="45" data-value="1944" data-select-text="Press to select" data-choice-selectable="">1944</div><div id="choices--choices-year-item-choice-46" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="46" data-value="1945" data-select-text="Press to select" data-choice-selectable="">1945</div><div id="choices--choices-year-item-choice-47" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="47" data-value="1946" data-select-text="Press to select" data-choice-selectable="">1946</div><div id="choices--choices-year-item-choice-48" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="48" data-value="1947" data-select-text="Press to select" data-choice-selectable="">1947</div><div id="choices--choices-year-item-choice-49" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="49" data-value="1948" data-select-text="Press to select" data-choice-selectable="">1948</div><div id="choices--choices-year-item-choice-50" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="50" data-value="1949" data-select-text="Press to select" data-choice-selectable="">1949</div><div id="choices--choices-year-item-choice-51" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="51" data-value="1950" data-select-text="Press to select" data-choice-selectable="">1950</div><div id="choices--choices-year-item-choice-52" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="52" data-value="1951" data-select-text="Press to select" data-choice-selectable="">1951</div><div id="choices--choices-year-item-choice-53" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="53" data-value="1952" data-select-text="Press to select" data-choice-selectable="">1952</div><div id="choices--choices-year-item-choice-54" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="54" data-value="1953" data-select-text="Press to select" data-choice-selectable="">1953</div><div id="choices--choices-year-item-choice-55" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="55" data-value="1954" data-select-text="Press to select" data-choice-selectable="">1954</div><div id="choices--choices-year-item-choice-56" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="56" data-value="1955" data-select-text="Press to select" data-choice-selectable="">1955</div><div id="choices--choices-year-item-choice-57" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="57" data-value="1956" data-select-text="Press to select" data-choice-selectable="">1956</div><div id="choices--choices-year-item-choice-58" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="58" data-value="1957" data-select-text="Press to select" data-choice-selectable="">1957</div><div id="choices--choices-year-item-choice-59" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="59" data-value="1958" data-select-text="Press to select" data-choice-selectable="">1958</div><div id="choices--choices-year-item-choice-60" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="60" data-value="1959" data-select-text="Press to select" data-choice-selectable="">1959</div><div id="choices--choices-year-item-choice-61" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="61" data-value="1960" data-select-text="Press to select" data-choice-selectable="">1960</div><div id="choices--choices-year-item-choice-62" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="62" data-value="1961" data-select-text="Press to select" data-choice-selectable="">1961</div><div id="choices--choices-year-item-choice-63" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="63" data-value="1962" data-select-text="Press to select" data-choice-selectable="">1962</div><div id="choices--choices-year-item-choice-64" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="64" data-value="1963" data-select-text="Press to select" data-choice-selectable="">1963</div><div id="choices--choices-year-item-choice-65" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="65" data-value="1964" data-select-text="Press to select" data-choice-selectable="">1964</div><div id="choices--choices-year-item-choice-66" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="66" data-value="1965" data-select-text="Press to select" data-choice-selectable="">1965</div><div id="choices--choices-year-item-choice-67" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="67" data-value="1966" data-select-text="Press to select" data-choice-selectable="">1966</div><div id="choices--choices-year-item-choice-68" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="68" data-value="1967" data-select-text="Press to select" data-choice-selectable="">1967</div><div id="choices--choices-year-item-choice-69" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="69" data-value="1968" data-select-text="Press to select" data-choice-selectable="">1968</div><div id="choices--choices-year-item-choice-70" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="70" data-value="1969" data-select-text="Press to select" data-choice-selectable="">1969</div><div id="choices--choices-year-item-choice-71" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="71" data-value="1970" data-select-text="Press to select" data-choice-selectable="">1970</div><div id="choices--choices-year-item-choice-72" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="72" data-value="1971" data-select-text="Press to select" data-choice-selectable="">1971</div><div id="choices--choices-year-item-choice-73" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="73" data-value="1972" data-select-text="Press to select" data-choice-selectable="">1972</div><div id="choices--choices-year-item-choice-74" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="74" data-value="1973" data-select-text="Press to select" data-choice-selectable="">1973</div><div id="choices--choices-year-item-choice-75" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="75" data-value="1974" data-select-text="Press to select" data-choice-selectable="">1974</div><div id="choices--choices-year-item-choice-76" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="76" data-value="1975" data-select-text="Press to select" data-choice-selectable="">1975</div><div id="choices--choices-year-item-choice-77" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="77" data-value="1976" data-select-text="Press to select" data-choice-selectable="">1976</div><div id="choices--choices-year-item-choice-78" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="78" data-value="1977" data-select-text="Press to select" data-choice-selectable="">1977</div><div id="choices--choices-year-item-choice-79" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="79" data-value="1978" data-select-text="Press to select" data-choice-selectable="">1978</div><div id="choices--choices-year-item-choice-80" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="80" data-value="1979" data-select-text="Press to select" data-choice-selectable="">1979</div><div id="choices--choices-year-item-choice-81" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="81" data-value="1980" data-select-text="Press to select" data-choice-selectable="">1980</div><div id="choices--choices-year-item-choice-82" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="82" data-value="1981" data-select-text="Press to select" data-choice-selectable="">1981</div><div id="choices--choices-year-item-choice-83" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="83" data-value="1982" data-select-text="Press to select" data-choice-selectable="">1982</div><div id="choices--choices-year-item-choice-84" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="84" data-value="1983" data-select-text="Press to select" data-choice-selectable="">1983</div><div id="choices--choices-year-item-choice-85" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="85" data-value="1984" data-select-text="Press to select" data-choice-selectable="">1984</div><div id="choices--choices-year-item-choice-86" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="86" data-value="1985" data-select-text="Press to select" data-choice-selectable="">1985</div><div id="choices--choices-year-item-choice-87" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="87" data-value="1986" data-select-text="Press to select" data-choice-selectable="">1986</div><div id="choices--choices-year-item-choice-88" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="88" data-value="1987" data-select-text="Press to select" data-choice-selectable="">1987</div><div id="choices--choices-year-item-choice-89" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="89" data-value="1988" data-select-text="Press to select" data-choice-selectable="">1988</div><div id="choices--choices-year-item-choice-90" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="90" data-value="1989" data-select-text="Press to select" data-choice-selectable="">1989</div><div id="choices--choices-year-item-choice-91" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="91" data-value="1990" data-select-text="Press to select" data-choice-selectable="">1990</div><div id="choices--choices-year-item-choice-92" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="92" data-value="1991" data-select-text="Press to select" data-choice-selectable="">1991</div><div id="choices--choices-year-item-choice-93" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="93" data-value="1992" data-select-text="Press to select" data-choice-selectable="">1992</div><div id="choices--choices-year-item-choice-94" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="94" data-value="1993" data-select-text="Press to select" data-choice-selectable="">1993</div><div id="choices--choices-year-item-choice-95" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="95" data-value="1994" data-select-text="Press to select" data-choice-selectable="">1994</div><div id="choices--choices-year-item-choice-96" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="96" data-value="1995" data-select-text="Press to select" data-choice-selectable="">1995</div><div id="choices--choices-year-item-choice-97" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="97" data-value="1996" data-select-text="Press to select" data-choice-selectable="">1996</div><div id="choices--choices-year-item-choice-98" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="98" data-value="1997" data-select-text="Press to select" data-choice-selectable="">1997</div><div id="choices--choices-year-item-choice-99" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="99" data-value="1998" data-select-text="Press to select" data-choice-selectable="">1998</div><div id="choices--choices-year-item-choice-100" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="100" data-value="1999" data-select-text="Press to select" data-choice-selectable="">1999</div><div id="choices--choices-year-item-choice-101" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="101" data-value="2000" data-select-text="Press to select" data-choice-selectable="">2000</div><div id="choices--choices-year-item-choice-102" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="102" data-value="2001" data-select-text="Press to select" data-choice-selectable="">2001</div><div id="choices--choices-year-item-choice-103" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="103" data-value="2002" data-select-text="Press to select" data-choice-selectable="">2002</div><div id="choices--choices-year-item-choice-104" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="104" data-value="2003" data-select-text="Press to select" data-choice-selectable="">2003</div><div id="choices--choices-year-item-choice-105" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="105" data-value="2004" data-select-text="Press to select" data-choice-selectable="">2004</div><div id="choices--choices-year-item-choice-106" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="106" data-value="2005" data-select-text="Press to select" data-choice-selectable="">2005</div><div id="choices--choices-year-item-choice-107" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="107" data-value="2006" data-select-text="Press to select" data-choice-selectable="">2006</div><div id="choices--choices-year-item-choice-108" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="108" data-value="2007" data-select-text="Press to select" data-choice-selectable="">2007</div><div id="choices--choices-year-item-choice-109" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="109" data-value="2008" data-select-text="Press to select" data-choice-selectable="">2008</div><div id="choices--choices-year-item-choice-110" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="110" data-value="2009" data-select-text="Press to select" data-choice-selectable="">2009</div><div id="choices--choices-year-item-choice-111" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="111" data-value="2010" data-select-text="Press to select" data-choice-selectable="">2010</div><div id="choices--choices-year-item-choice-112" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="112" data-value="2011" data-select-text="Press to select" data-choice-selectable="">2011</div><div id="choices--choices-year-item-choice-113" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="113" data-value="2012" data-select-text="Press to select" data-choice-selectable="">2012</div><div id="choices--choices-year-item-choice-114" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="114" data-value="2013" data-select-text="Press to select" data-choice-selectable="">2013</div><div id="choices--choices-year-item-choice-115" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="115" data-value="2014" data-select-text="Press to select" data-choice-selectable="">2014</div><div id="choices--choices-year-item-choice-116" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="116" data-value="2015" data-select-text="Press to select" data-choice-selectable="">2015</div><div id="choices--choices-year-item-choice-117" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="117" data-value="2016" data-select-text="Press to select" data-choice-selectable="">2016</div><div id="choices--choices-year-item-choice-118" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="118" data-value="2017" data-select-text="Press to select" data-choice-selectable="">2017</div><div id="choices--choices-year-item-choice-119" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="119" data-value="2018" data-select-text="Press to select" data-choice-selectable="">2018</div><div id="choices--choices-year-item-choice-120" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="120" data-value="2019" data-select-text="Press to select" data-choice-selectable="">2019</div><div id="choices--choices-year-item-choice-121" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="121" data-value="2020" data-select-text="Press to select" data-choice-selectable="">2020</div></div></div></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label class="form-label mt-4">Email</label>
          <div class="input-group">
            <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
        </div>
        <div class="col-6">
          <label class="form-label mt-4">Confirmation Email</label>
          <div class="input-group">
            <input id="confirmation" name="confirmation" class="form-control" type="email" placeholder="example@email.com" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label class="form-label mt-4">Your location</label>
          <div class="input-group">
            <input id="location" name="location" class="form-control" type="text" placeholder="Sydney, A" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
        </div>
        <div class="col-6">
          <label class="form-label mt-4">Phone Number</label>
          <div class="input-group">
            <input id="phone" name="phone" class="form-control" type="number" placeholder="+40 735 631 620" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 align-self-center">
          <label class="form-label mt-4">Language</label>
          <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-control choices__input" name="choices-language" id="choices-language" hidden="" tabindex="-1" data-choice="active"><option value="English">English</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="English" data-custom-properties="null" aria-selected="true">English</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder=""><div class="choices__list" role="listbox"><div id="choices--choices-language-item-choice-1" class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="English" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">English</div><div id="choices--choices-language-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="French" data-select-text="Press to select" data-choice-selectable="">French</div><div id="choices--choices-language-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Spanish" data-select-text="Press to select" data-choice-selectable="">Spanish</div></div></div></div>
        </div>
        <div class="col-md-6">
          <label class="form-label mt-4">Skills</label>
          <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><input class="form-control choices__input" id="choices-skills" type="text" value="vuejs,angular,react,dzdsc,bx" placeholder="Enter something" hidden="" tabindex="-1" data-choice="active" onfocus="focused(this)" onfocusout="defocused(this)"><div class="choices__list choices__list--multiple"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="vuejs" data-custom-properties="null" aria-selected="true" data-deletable="">vuejs<button type="button" class="choices__button" aria-label="Remove item: 'vuejs'" data-button="">Remove item</button></div><div class="choices__item choices__item--selectable" data-item="" data-id="2" data-value="angular" data-custom-properties="null" aria-selected="true" data-deletable="">angular<button type="button" class="choices__button" aria-label="Remove item: 'angular'" data-button="">Remove item</button></div><div class="choices__item choices__item--selectable" data-item="" data-id="3" data-value="react" data-custom-properties="null" aria-selected="true" data-deletable="">react<button type="button" class="choices__button" aria-label="Remove item: 'react'" data-button="">Remove item</button></div><div class="choices__item choices__item--selectable" data-item="" data-id="4" data-value="dzdsc" data-custom-properties="null" aria-selected="true" data-deletable="">dzdsc<button type="button" class="choices__button" aria-label="Remove item: 'dzdsc'" data-button="">Remove item</button></div><div class="choices__item choices__item--selectable" data-item="" data-id="5" data-value="bx" data-custom-properties="null" aria-selected="true" data-deletable="">bx<button type="button" class="choices__button" aria-label="Remove item: 'bx'" data-button="">Remove item</button></div></div><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" style="min-width: 1ch; width: 5ch;"></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__item choices__item--choice">Only 5 values can be added</div></div></div>
        </div>
      </div>
    </div>
  </div>  --}}

{{--  
  <div class="card">
    <!-- Card header -->

    <!-- Card body -->
    <div class="card-body">
        <form>
            <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
        <option data-select2-id="3">Alerts</option>
        <option data-select2-id="5">Badges</option>
        <option data-select2-id="6">Buttons</option>
        <option data-select2-id="7">Cards</option>
        <option data-select2-id="8">Forms</option>
        <option data-select2-id="9">Modals</option>
        </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 580.222px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-4zjv-container"><span class="select2-selection__rendered" id="select2-4zjv-container" role="textbox" aria-readonly="true" title="Buttons">Buttons</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
        </form>
    </div>
</div>  --}}



    <div class="card">      
      <!-- Card header -->
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Clients </h3>
            <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
              <button class="btn btn-info w-100 mb-0 toast-btn" type="button" data-target="infoToast">Info Notification</button>
            </div>
            <button class="btn buttons-print btn-sm btn-default" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Print</span></button>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="input-group input-group-lg">
                <span class="input-group-text text-body bg-transparent border-0">
                  <i class="ni ni-zoom-split-in text-lg" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search anything..." onfocus="focused(this)" onfocusout="defocused(this)">
              </div>
            </div>

          </div>
          <div class="col-4 text-right">


              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Add Clients</button>
              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
        <div class="modal-body p-0">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h3 class="mb-0">Add Clients</h3>
                </div>
                <form role="form" method="POST" action="{{ route('add.clients') }}">
                  @csrf

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group has-success">
                        <label class="form-control-label" for="input-first-name">Client Name</label>
                        <input type="text" name="client_name" id="input-first-name" class="form-control" placeholder="Seller Name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Client Surname</label>
                          <input type="text" name="client_surname" id="input-first-name" class="form-control" placeholder="Seller Surname">
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Client City</label>
                        <input type="text" name="client_city" id="input-first-name" class="form-control" placeholder="Product Cost">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Client Phone</label>
                        <input type="tel" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits"  name="client_phone" id="input-last-name" class="form-control" placeholder="Seller Price">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Client Store</label>
                        <input type="text" name="client_store" id="input-first-name" class="form-control" placeholder="Product Cost">
                      </div>
                    </div>
                  </div>


                  <input type="hidden" checked name="client_status" value="0">
  


                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Add</button>
                    </div>
                </form>
            </div>
        </div>
        
     
                </div>
            </div>
        </div>
          </div>

            {{--  <a href="#!" class="btn btn-sm btn-primary">Add category</a>  --}}
          </div>
        </div>
      </div>
      <!-- Light table -->
      <div class="table-responsive">


        <div class="row">

        <div class="col-sm-12 col-md-12"><div id="datatable-basic_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-basic"></label></div></div></div>


        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              {{-- <th scope="col" class="sort" data-sort="name">Sort Number</th> --}}
              <th scope="col" class="sort" data-sort="name">ID</th>
              <th scope="col" class="sort" data-sort="budget">Image</th>
              <th scope="col" class="sort" data-sort="budget">Name</th>
              <th scope="col" class="sort" data-sort="budget">Surname</th>
              <th scope="col" class="sort" data-sort="budget">City</th>
              <th scope="col" class="sort" data-sort="budget">Phone</th>
              <th scope="col" class="sort" data-sort="budget">Store</th>
              <th scope="col" class="sort" data-sort="budget">Status</th>
              <th scope="col" class="sort" data-sort="budget">Test</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="list">
           @foreach ($clients as $key=>$row)
             
            <tr>
              {{-- <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $key +1 }}</span>
                  </div>
                </div>
              </th> --}}

              
              <th scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">{{ $row->id }}</span>
                  </div>
                </div>
              </th>

              <td class="text-xs font-weight-bold">
                <div class="d-flex align-items-center">
                  <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-times" aria-hidden="true"></i></button>
                  <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-undo" aria-hidden="true"></i></button>
                  <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
                  <span>Paid</span>
                </div>
              </td>

              <td>
                <div class="d-flex px-3 py-1">
                  <div>
                    <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/black-mug.jpg" class="avatar me-3" alt="image">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Business Kit (Mug + Notebook)</h6>
                    <p class="text-sm font-weight-bold text-primary mb-0"><span class="text-success">12.821</span> orders</p>
                  </div>
                </div>
              </td>


              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->client_name }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->client_surname }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->client_city }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->client_phone }}</span>
                </span>
              </td>
              <td>
                <span class="badge badge-dot mr-4">
                  <span class="status">{{ $row->client_store }}</span>
                </span>
              </td>
              <td scope="row">
                <div class="media align-items-center">
                  <div class="media-body">
                    <span class="name mb-0 text-sm">
                      @if ($row->client_status == 0)
                      <a href="{{ URL::to('/active/clients/'.$row->id) }}" type="button" title="Active"
                        class="btn-sm btn-outline-danger"><i class="ni ni-bold-down"></i></a>
                      @else
                      <a href="{{ URL::to('/deactive/clients/'.$row->id) }}" type="button" title="Deactive" 
                        class="btn-sm btn-outline-info"><i class="ni ni-like-2"></i></a>
                      @endif
                    </span>
                  </div>
                </div>
              </td>

              <td class="align-middle text-end">
                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                  <p class="text-sm font-weight-bold mb-0">13</p>
                  <i class="ni ni-bold-down text-sm ms-1 mt-1 text-success"></i>
                  <button type="button" class="btn btn-sm btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="rRefund rate is lower with 97% than other products" data-bs-original-title="Refund rate is lower with 97% than other products">
                    <i class="fas fa-info" aria-hidden="true"></i>
                  </button>
                </div>
              </td>

              <td class="text-right">                
{{--  <a href="{{ URL::to('/admin/edit/clients/'.$row->id) }}"  type="button" class="btn-sm btn-warning">Edit</a>
<a href="{{ URL::to('/admin/delete/clients/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->product_name }} clients?')"  type="button" class="btn-sm btn-primary" style="color:white;">Delete</a>  --}}

<a href="{{ URL::to('/admin/edit/clients/'.$row->id) }}"  class="table-action" data-toggle="tooltip" data-original-title="Edit Client"><i class="fas fa-user-edit"></i></a>
<a href="{{ URL::to('/admin/delete/clients/'.$row->id) }}" onclick="return confirm('Are you sure to delete {{ $row->client_store }} client?')"   type="button" class="table-action table-action-delete"  style="padding-left: 25%" data-toggle="tooltip" data-original-title="Delete Client"><i class="fas fa-trash"></i></a>

</td>
            </tr>

            @endforeach

           
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        {{ $clients->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>



  <script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/core/popper.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/core/bootstrap.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/plugins/dragula/dragula.min.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/plugins/jkanban/jkanban.js"></script>
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/argon-dashboard.min.js?v=2.0.0"></script>





  <script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/plugins/sweetalert.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
    </html>  


@endsection