<?php
/*
Template Name: about
*/

get_header();
?>
<link rel='stylesheet' id='style-css' href='<?php echo get_stylesheet_directory_uri(); ?>/css/about.css' />

<main id="primary" class="site-main">
    <section class="page-top">
        <div class="til tac wrapper-ovn">
            <h1 class="tac">About</h1>
        </div>
    </section>
    <section class="parsonal">
        <div class="wrapper-ovn flex">
            <h2 class="personal-til">Personal data<br><span>私について</span></h2>
            <table class="personal-data">
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
            </table>
        </div>
    </section>

    <section class="skill">
        <div class="wrapper-ovn">
            <div id="app">
                <div class="flex about-til">
                    <h2>Skill<br><span>スキル</span></h2>
                    <div class="filter_skill">
                        <label for="category-select_skill">カテゴリで並び替え</label>
                        <select v-model="selectedCategory">
                            <option value="all">all</option>
                            <option value="tool">tool</option>
                            <option value="language">language</option>
                        </select>
                    </div>
                </div>
                <!-- スキル一覧 -->
                <div class="skill-li">
                    <div v-for="skill in filteredSkills" :key="skill.name" class="skill-item">
                        <div class="flexs acodion">
                            <h3>{{ skill.name }} <span>{{ skill.year }}年</span></h3>
                            <div class="skill-bar" :style="{ width: skill.level + '%' }">
                                <span>{{ skill.level }}%</span>
                            </div>
                        </div>
                        <p>{{ skill.description }}</p>
                    </div>
                </div>
                <!-- スキル一覧 END-->
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const App = {
        data() {
            return {
                selectedCategory: 'all',
                skills: [
                    { name: 'HTML/CSS', level: 90, year: 5, category: 'language', description: 'Webページの基本構造とスタイリングができる' },
                    { name: 'JavaScript', level: 80, year: 4, category: 'language', description: 'インタラクティブな機能の実装ができる' },
                    { name: 'Photoshop', level: 75, year: 6, category: 'tool', description: '画像編集やデザイン制作' },
                ],
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
    };

    Vue.createApp(App).mount('#app');
});
</script>
<?php
get_sidebar();
get_footer();
