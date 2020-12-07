<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <?php if (isset($_SESSION['auth']) && $_SESSION['auth']) {
                    include $_SERVER['DOCUMENT_ROOT'] . '/include/profile_info.php';
                } ?>
            </td>
            <td class="right-collum-index"></td>
        </tr>
    </table>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php'; ?>