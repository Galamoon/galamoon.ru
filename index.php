<?
/**
 * @global $APPLICATION
 */
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>
    <h2 class="text-center">Обо мне</h2>
    <p>Программист PHP, сертифицированный разработчик 1С-Битрикс, имею большой опыт разработки интернет-магазинов,
        корпоративных корталов, CRM систем различной сложности, а также интеграции магазинов с внешними API, платежными
        системами и службами доставки. Пишу код согласно здравому смыслу и PSR. <br> Работаю ведущим программистом и тимлидом в аутсорс-продакшн компании <a rel="noopener noreferrer" href="https://ylab.io/">Ylab</a>.</p>
    <div>
        <span>Мои задачи:</span>
        <ul>
            <li>Ведение проектов на Bitrix БУС, Bitrix24, Symphony, Laravel.</li>
            <li>Оценка трудозатрат на разработку, декомпозиция задач</li>
            <li>Управление командой разработки</li>
            <li>Собеседование разработчиков</li>
            <li>Менторство</li>
        </ul>
    </div>

    <h2 class="text-center">Сертификаты</h2>
    <div>

    </div>

    <h2 class="text-center">Написать мне</h2>
    <form action="#">
        <div class="mt-10">
            <input type="text" name="CONTACT_INFO" placeholder="Контактная информация"  required class="single-input">
        </div>
        <div class="mt-10">
            <textarea class="single-textarea" name="MESSAGE" placeholder="Сообщение" required></textarea>
        </div>
        <div class="mt-10">
            <button class="genric-btn primary" type="submit">Отправить</button>
        </div>
    </form>
<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>