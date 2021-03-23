import autocomplete from 'autocompleter';

const citySelector = document.getElementById('city-selector');

autocomplete({
    input: citySelector,
    fetch: function (text, update) {
        fetch(cityNamesPath.replace(':text', text))
            .then(response => response.json())
            .then(cityNames => update(cityNames));
    },
    onSelect: function (city) {
        citySelector.value = city.name;
        window.location.href = showCityPath.replace(':city', city.id);
    },
    render: function (city) {
        const div = document.createElement("div");
        div.textContent = city.name;
        return div;
    },
});
