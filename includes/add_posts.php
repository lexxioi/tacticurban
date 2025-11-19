<section id="share--form">
            <div class="container">
                <h2 class="title">Преображаем город <span class="accent">вместе</span></h2>
                <p class="share--text">Расскажите о своей идеи или поделитесь проектом, который реализовали в вашем городе</p>
                <form action="" method="">
                    <label for="desc">Описание</label>
                    <textarea name="desc" id="desc"></textarea>
                    <div class="wrap-inputs">
                        <div class="item-input">
                            <label for="city">Город</label>
                            <input type="text" id="city">
                        </div>
                        <div class="item-input">
                            <label for="year">Год реализации</label>
                            <input type="text" id="year" pattern="[0-9]+$">
                        </div>
                    </div>
                    <label for="file">Файл</label>
                    <input type="file" id="file" accept="image/*" style="font-family: Advent Pro">
                    <input type="submit" name="" id="btn--submit">
                </form>
            </div>
        </section>
    </main>