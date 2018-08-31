<script>
    function submitSearch() {
        var keyword = document.getElementById("input").value;
        if (!keyword) {
            return false
        }
        var form = document.getElementById("search");
        form.setAttribute("action", form.getAttribute("action")+"/"+keyword);
//        alert(form.getAttribute("action"));
//                        form.submit();
        return true;
    }
</script>
