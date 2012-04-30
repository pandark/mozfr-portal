<?php
  $sources = array(
    'blog'    => 'http://blog.frenchmozilla.org/index/feed/rss2',
    'planete' => 'http://planete.mozfr.org/?type=atom10',
    'geckozone'   => 'http://www.geckozone.org/forum/feed.php',
    'bugzilla'     => 'https://bugzilla.frenchmozilla.org/buglist.cgi?title=Bugzilla%20Mozilla%20Francophone&ctype=atom&limit=6'
  );

  $news = array();
  require_once('./lib/simplepie.php');
  $feed = new SimplePie();
  foreach( $sources as $source => $url) :
    $feed->set_feed_url($url);
    $feed->init();
    $feed->handle_content_type();
    $news[$source] = array();
    foreach ($feed->get_items(0,6) as $item) :
      $news[$source][] = '<a href="' . $item->get_permalink() . '">' .
      str_replace(
        array('<div>','</div>','<span>','</span>'), '',
        $item->get_title()
      ) .
      '</a>';
    endforeach;
  endforeach;
  unset($item);
  unset($source);
  unset($url);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="fr"> <![endif]--> <!--[if IE 7]> <html class="no-js ie7 oldie" lang="fr"> <![endif]--> <!--[if IE 8]> <html class="no-js ie8 oldie" lang="fr"> <![endif]--> <!--[if gt IE 8]><!--> <html xmlns="http://www.w3.org/1999/xhtml" class="no-js"  xml:lang="fr" lang="fr"> <!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Mozilla Francophone</title>
  <meta charset="UTF-8">
  <meta name="publisher" content="MozFr">
  <meta name="description" content="Communauté Mozilla francophone, dernières nouvelles et activités de MozFr">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="./style.css">
  <script src="js/lib/html5shiv.js"></script>
  <script src="js/lib/respond.js"></script>
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <link rel="index" title="Mozilla Francophone" href="http://www.mozfr.org/">
</head>
<body>
  <header id="header" class="clearfix">
    <h1><a href="/">Mozilla Francophone</a></h1>
    <nav id="menu">
<ul id="skipmenu"><li><a href="#content">Aller au contenu</a></li></ul>
<ul><li><a
href="/">Accueil</a></li><li><a
href="/contrib" title="Participez et aidez la communauté">Contribuez</a></li><li><a
href="http://mozfr.org/mailman/listinfo/moz-fr">Discussions</a></li><li><a
href="http://wiki.mozfr.org/">Wiki</a></li><li><a
href="/manifeste" title="Manifeste de Mozilla">Manifeste</a></li></ul>
    </nav>
  </header><!-- header -->

  <aside id="sidebar" class="clearfix">
    <section id="nationbox" class="box">
      <h2>Communautés</h2>
      <ul>
        <li id="community-dz">
          <a href="http://mozilla-algeria.org/" title="site de la communauté algérienne">Mozilla Algeria</a>
        </li>
        <li id="community-be">
          <a href="http://mozilla-belgium.org/" title="site de la communauté belge">Mozilla Belgium</a>
        </li>
        <li id="community-ma">
          <a href="http://mozilla.ma/" title="site de la communauté marocaine">Mozilla Morocco</a>
        </li>
        <li id="community-sn">
          <a href="http://mozilla-senegal.org/" title="site de la communauté sénégalaise">Mozilla Senegal</a>
        </li>
        <li id="community-tn">
          <a href="http://mozilla-tunisia.org/" title="site de la communauté tunisienne">Mozilla Tunisia</a>
        </li>
      </ul>
      <footer class="tomenu"><a href="#menu">Retour au menu</a></footer>
    </section>
    <section id="dlbox" class="box">
      <h2>Téléchargements</h2>
      <ul>
        <li id="firefox">
          <a href="http://www.mozilla.org/fr/firefox/?from=mozfr">Firefox</a>
        </li>
        <li id="thunderbird">
          <a href="http://www.mozilla.org/fr/thunderbird/?from=mozfr">Thunderbird</a>
        </li>
      </ul>
      <footer class="tomenu"><a href="#menu">Retour au menu</a></footer>
    </section>
    <section id="portalbox" class="box">
      <h2>Activités</h2>
      <ul>
        <li id="twitterlink">
          <a href="https://twitter.com/#!/mozilla_fr" title="Suivez-nous sur Twitter">@Mozilla_FR</a>
        </li>
        <li id="planetelink">
          <a href="http://planete.mozfr.org/" title="Agrégation de blogs parlant de Mozilla et de Web Ouvert en français.">Planète MozFr</a>
          </li>
          <li id="bonjourmozillalink">
          <a href="http://bonjourmozilla.fr/" title="Présentation quasi-quotidienne de membres de la communauté">Bonjour Mozilla</a>
        </li>
        <li id="frenchmozillalink">
          <a href="http://frenchmozilla.org/" title="Site des traducteurs francophones">French Mozilla</a>
        </li>
        <li id="geckozonelink">
          <a href="http://geckozone.org/" title="Aide et support technique des utilisateurs Mozilla">Geckozone</a>
        </li>
      </ul>
      <footer class="tomenu"><a href="#menu">Retour au menu</a></footer>
    </section>
  </aside><!-- sidebar -->

  <div id="content" class="clearfix">

    <article id="edito" class="box">
      <header>
        <h2>Bienvenue dans la communauté Mozilla francophone&nbsp;!</h2>
      </header>
      <section>
        <p>Ce site est un portail vers les activités de la communauté francophone de Mozilla. Vous trouverez des informations sur la localisation des sites web et applications Mozilla, ainsi que sur l'organisation des événements, les projets de cette communauté et les personnes qui y participent.</p>
      </section>
      <footer class="tomenu"><a href="#menu">Retour au menu</a></footer>
    </article>
    <article id="blogbox" class="box">
      <header>
        <h2>Blog MozFr</h2>
      </header>
      <section>
        <ul><!-- http://blog.frenchmozilla.org/index/feed/rss2 -->
          <?php while ($n = next($news['blog'])) { echo '<li>'. $n .'</li>'; }; ?>
        </ul>
        <p class="more"><a href="http://blog.mozfr.org">Plus de billets&hellip;</a></p>
      </section>
      <footer class="tomenu"><a href="#menu">Retour au menu</a></footer>
    </article>
    <article id="planetbox" class="box">
      <header>
        <h2>Planète MozFr</h2>
      </header>
      <section>
        <ul>
          <?php while ($n = next($news['planete'])) { echo '<li>'. $n .'</li>'; }; ?>
        </ul>
        <p class="more"><a href="http://planete.mozfr.org/">Plus de billets&hellip;</a></p>
      </section>
      <footer class="tomenu"><a href="#menu">Retour au menu</a></footer>
    </article>
    <article id="geckobox" class="box">
      <header>
        <h2>Forum Geckozone</h2>
      </header>
      <section>
        <ul><!-- http://www.geckozone.org/forum/feed.php -->
          <?php while ($n = next($news['geckozone'])) { echo '<li>'. $n .'</li>'; }; ?>
        </ul>
        <p class="more"><a href="http://www.geckozone.org/forum/">Plus de messages&hellip;</a></p>
      </section>
      <footer class="tomenu"><a href="#menu">Retour au menu</a></footer>
    </article>
    <article id="bugbox" class="box">
      <header>
        <h2>Bugzilla</h2>
      </header>
      <section>
        <ul><!-- https://bugzilla.frenchmozilla.org/buglist.cgi?title=Bugzilla%20Mozilla%20Francophone&ctype=atom&limit=5 -->
          <?php while ($n = next($news['bugzilla'])) { echo '<li>'. $n .'</li>'; }; ?>
        </ul>
        <p class="more"><a href="http://blog.mozfr.org">Plus de bogues&hellip;</a></p>
      </section>
      <footer class="tomenu"><a href="#menu">Retour au menu</a></footer>
    </article>

  </div><!-- content -->
  <footer id="footer">
  <p>Sauf mention contraire, le site est placé sous licence <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.fr">Creative Commons paternité partage à l’identique</a>.</p>
    <p>Ce site est maintenu par des bénévoles et n'est pas un site officiel de la <a href="http://www.mozilla.org/">fondation Mozilla</a>.</p>
  </footer><!-- footer -->
</body>
</html>
