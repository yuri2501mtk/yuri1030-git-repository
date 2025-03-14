<?php
/*
Template Name:about
*/

get_header();
?>
<link rel='stylesheet' id='style-css'  href='<?php echo get_stylesheet_directory_uri();?>/css/about.css' />

	<main id="primary" class="site-main about">
			<section class="page-top ">
		<div class="til tac wrapper-ovn">
				<h1  class="tac">About</h1>
		</div>
					</section>

					<section class="parsonal">
						<div class="wrapper-ovn flex">
						<!-- <h2 class="personal-til">Personal data<br><span>私について</span></h2> -->
						<!-- <table class="personal-data">
  <tr>
    <th>Name</th>
    <th>Birthday</th>
	<th>Birth place</th>
  </tr>
  <tr>
    <td>Yurina Negishi</td>
    <td>1999.10.30</td>
	<td>Gumma, Japan</td>
  </tr>
</table> -->
</div>
</section>


<section class="skill box-top">
<div class="wrapper-ovn" >
	<div id="app">
<div class="flex jss about-til">
	<h2>Skill<span>スキル一覧</span></h2>

	<div class="filter_skill">
	<label for="category-select_skill">
	</label>
	<select v-model="selectedCategory" >
	<option value="all">All</option>
	<option value="tool">Tool</option>
	<option value="language">Language</option>
</select>
	</div>
</div>
<!-- スキル一覧 -->
<div class="about-li">
	<div v-for="skill in filteredSkills" :key="skill.name" class="about-item ">
		<div class="flex acordion aic">
		<h3>{{ skill.name }} <span>{{ skill.year }}year</span></h3>
		<div class="skill-bar" :style="{ width: skill.level + '%'}"><span>{{ skill.level }}%</span></div>
		</div>
		<div class="about-item_container">
		<p class="txt">{{ skill.description }}</p>
		</div>
	</div>
</div>
<!-- スキル一覧 END-->
</div>
</div>
</section>

<section class="box-top history">
<div class="wrapper-ovn" >
	<div id="app02">
<div class="flex jss about-til">
	<h2>History<span>経歴</span></h2>
</div>
<!-- 経歴一覧 -->
<div class="about-li">
	<div v-for="history in sortedHistory" :key="history.id" class="about-item ">
		<div class="flex acordion aic">
		<h3><small>{{ history.startDate }} - {{ history.endDate || 'NOW' }}</small><br class="dn-pc">{{ history.place }}</h3>
		</div>
    <div class="about-item_container">
		<template v-if="history.type === 'school' ">

      <p class="subtxt"><span>学部</span>{{ history.faculty }}</p>
		<p class="txt">{{ history.description }}</p>

		</template>
    <template v-if="history.type === 'work' ">

      <p class="subtxt"><span>業界</span><br class="dn-pc">{{ history.industry || '-' }}</p>
      <p class="subtxt"><span>職種</span>{{ history.role || '-'  }}</p>
    <p class="txt">{{ history.description }}</p>

    </template>
    </div>
	</div>
</div>
<!-- 経歴一覧 END-->
</div>
</div>
</section>
</main><!-- #main -->
<script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  // Vue.js の初期化
  const App = {
    data() {
      return {
        selectedCategory: 'all',
        skills: aboutData.skills || [],
      };
    },
    computed: {
      filteredSkills() {
        if (this.selectedCategory === 'all') {
          return this.skills;
        }
        return this.skills.filter(skill => skill.category === this.selectedCategory);
      },
    },
    updated() {
      // Vue.js の再レンダリング後にアコーディオンイベントを再適用
      applyAccordionListeners();
    },
  };

  Vue.createApp(App).mount('#app');



const CareerApp = {
  data() {
    return {
      history: aboutData.history || [],
    };
  },
  computed: {
    sortedHistory() {
      return this.history.sort((a, b) => new Date(a.startDate) - new Date(b.startDate));
    },
  },
  updated() {
    applyAcordionListeners();
  },
};
Vue.createApp(CareerApp).mount('#app02');


  // アコーディオンのイベントを設定する関数
  function applyAccordionListeners() {
    const acordions = document.querySelectorAll('.acordion');

    acordions.forEach(acordion => {
      // 一度既存のリスナーを解除してから追加する（イベントの重複を防ぐ）
      acordion.removeEventListener('click', toggleAccordion);
      acordion.addEventListener('click', toggleAccordion);
    });
  }

  // アコーディオンの開閉を処理する関数
  function toggleAccordion(event) {
    const acordion = event.currentTarget;
    const container = acordion.nextElementSibling; // 次の兄弟要素(about-item_container)を取得

    if (container.classList.contains('open')) {
      // 既に開いている場合は閉じる
      container.classList.remove('open');
      container.style.maxHeight = null;
      acordion.classList.remove('active'); // アコーディオン本体からクラスを削除
    } else {
      // 現在のアコーディオンを開く
      container.classList.add('open');
      container.style.maxHeight = container.scrollHeight + 'px';
      acordion.classList.add('active'); // アコーディオン本体にクラスを追加
    }
  }

  // 初回レンダリング時にイベントを適用
  applyAccordionListeners();
});


</script>
<?php
get_sidebar();
get_footer();
