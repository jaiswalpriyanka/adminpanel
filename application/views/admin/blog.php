<?php $this->load->view('admin/include/top-header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>
<!-- https://www.codexworld.com/multi-language-implementation-in-codeigniter/ -->
<div class="row">
<div class="col-md-8"></div>
<div class="col-md-4">
  <select onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
    <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
    <option value="french" <?php if($this->session->userdata('site_lang') == 'french') echo 'selected="selected"'; ?>>French</option>   
</select>

</div>

</div>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo site_url();?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">User List</li>
        </ol>

        <!-- Page Content -->
        <h3>Blog Section</h3>
        <hr>
   <div class="row">
       <div class="col-md-1"></div>
        <div class="breadcrumb col-md-10">
        <p>
          A few days before Hurricane Irma hit South Florida, I received a query on Twitter from a graphic designer named Eric Bailey.

        “Has anyone researched news sites capability to provide low-bandwidth communication of critical info during crisis situations?” he asked.

        The question was timely — two days later, CNN announced that they created a text-only version of their site with no ads or videos.
        </p>
      </div>
      <div class="col-md-1"></div>
</div>
   
<div class="row">
  <div class="col-md-1"></div>
    <div class="breadcrumb col-md-10">
    <p>
     These text-only sites — which used to be more popular in the early days of the Internet, when networks were slower and bandwidth was at a premium – are incredibly useful, and not just during natural disasters. They load much faster, don’t contain any pop-ups or ads or autoplay videos, and help people with low bandwidth or limited Internet access. They’re also beneficial for people with visual impairments who use screen readers to navigate the Internet.
    </p>
  </div>
  <div class="col-md-1"></div>
 </div>


   <div class="row">
  <div class="col-md-1"></div>
    <div class="breadcrumb col-md-10">
    <p>
     Earlier this month, a number of improvements were made to the site (which redirects to thin.npr.org) aimed specifically at low-bandwidth users. 

      “More recently, our full site [npr.org] has made major accessibility gains,” write Patrick Cooper, NPR’s director of web and engagement, and Sara Goo, the managing editor of digital news. “But as accessible or as fast as you can make your full site —and speed is critical for us — low-bandwidth situations are a different challenge. [Our] improvements focused on those users in particular.”
    </p>
  </div>
  <div class="col-md-1"></div>
 </div>
   



   <div class="row">
  <div class="col-md-1"></div>
    <div class="breadcrumb col-md-10">
    <p>
     In recent months, Twitter, Facebook, and Google News have also published their own versions of stripped-down sites that use less bandwidth, mainly aimed at users in emerging markets who might not have access to faster network connections. Earlier this week, Twitter announced that it was now experimenting with an Android app designed to use less data for people with limited connectivity.
    </p>
  </div>
  <div class="col-md-1"></div>
 </div>
   
   <div class="row">
  <div class="col-md-1"></div>
    <div class="breadcrumb col-md-10">
    <p>
     There are many ways that news organizations can improve the ways they serve both low-bandwidth users and people with visual impairments by stripping out unnecessary elements and optimizing different parts of a website. To learn more, I reached out to front-end website designer J. Albert Bowden, who frequently tweets about accessibility and web design standards, to ask a few questions about how we might approach building text-only sites to help end users.
    </p>
  </div>
  <div class="col-md-1"></div>
 </div>
   

 <div class="row">
  <div class="col-md-1"></div>
    <div class="breadcrumb col-md-10">
    <p>
     Kramer: I’m curious. What kinds of things can be stripped from sites for low-bandwidth users and people with visual impairments?

Bowden: Those are two very distinct user groups but some of the approaches bleed over and can be applied together.

For low-bandwidth users: Cut the fluff. No pictures, no video, no ads or tracking. Text files are good enough here. Anything else is just fluff.

For visually impaired users: I’m going to just talk about a11y [which is a shorthand way of referring to computer accessibility] here.

A11y is best addressed in the foundation of a website, in the CSS, HTML, and JavaScript. There are other ways to go about doing it, but they are much more resource intensive and therefore are never going to be default for mainstream.

Typical user agents for those with visual impairments are screen readers, which rely on the foundation (literally HTML) of a website to interpret its content and regurgitate it back to the user.

Kramer: Is text-only the way to go? Are there ways to think about preloading images and/or other methods that might help these users?
    </p>
  </div>
  <div class="col-md-1"></div>
 </div>
	 





	 <br>
</div>
      <!-- /.container-fluid -->

<?php $this->load->view('admin/include/footer'); ?>