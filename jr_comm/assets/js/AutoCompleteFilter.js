var GridID = "";
function CrateFilter(ctlID) {
    var MainContainer = document.createElement("div");
    var FilterContainer = document.createElement("div");
    MainContainer.className = "filterComboBox";
    MainContainer.id = "MainContainer" + ctlID;
    FilterContainer.className = "Filtercontainer";
    FilterContainer.id = "FilterContainer" + ctlID;
    _(ctlID).parentNode.appendChild(MainContainer);
    _(ctlID).parentNode.appendChild(FilterContainer);
    _(ctlID).setAttribute("filter-container", FilterContainer.id);
  
    $("#" + ctlID + "").combobox();
}


function RemoveFilter(closediv) {
    closediv.parentNode.parentNode.removeChild(closediv.parentNode);
    SearchByFilters();
}

function GetFilterSelectedValues(FilterControlID) {
    var FilterContainer = _("FilterContainer" + FilterControlID);
    var SelectedFilters = "";
    var Filters;

    Filters = FilterContainer.getElementsByClassName("SelectedFilter");
    if (Filters.length > 0) {
        SelectedFilters += Filters[0].parentNode.parentNode.attributes["filter-column"].value + " in(";
        for (var j = 0; j < Filters.length; j++) {
            SelectedFilters += Filters[j].attributes["data-value"].value + ",";
        }
        SelectedFilters = SelectedFilters.substring(0, SelectedFilters.length - 1);
        SelectedFilters += ")";
    }


    return SelectedFilters;
}

function GetAllFilterSelectedValues() {
    var Filters = document.getElementsByClassName("Filtercontainer");
    var SelectedFilters = "";
    var Filter;
    for (var i = 0; i < Filters.length; i++) {
        Filter = Filters[i].getElementsByClassName("SelectedFilter");
        if (Filter.length > 0) {
            SelectedFilters += Filters[i].attributes["filter-column"].value + " in(";
            for (var j = 0; j < Filter.length; i++) {
                SelectedFilters += Filter[j].attributes["data-value"].value + ",";
            }
            SelectedFilters += ")|";
        }
    }
    return SelectedFilters;
}

function SearchByFilters() {
    $("#" + GridID).trigger("reloadGrid");
}

function GenerateSearchContainer(ctlID) {
    var Control = _(ctlID);
    var SearchContainer = document.createElement("div");
    SearchContainer.id = "SearchContainer" + ctlID;
    SearchContainer.className = "Filtercontainer";
    Control.parentNode.parentNode.parentNode.appendChild(SearchContainer);
    _("imgsubmit").addEventListener("click", function () { if (_(ctlID).value.replace("/ +/", " ") != "") { AddFilter(SearchContainer.id, _(ctlID).value, _(ctlID).value); _(ctlID).value = ""; }  }, false);
    //<div class="Filtercontainer" id="FilterContainercboProjectCategory" filter-column="ProjectCategoryID"><div class="buttonWrapper"><div data-value="5" class="SelectedFilter">TEst category 2 </div> <div onclick="RemoveFilter(this);" class="crossBtn"> </div></div></div>
}


function GetSearchedValues(SearchControlID) {
    var FilterContainer = _("SearchContainer" + SearchControlID);
    var SelectedFilters = "";
    var Filters;
    Filters = FilterContainer.getElementsByClassName("SelectedFilter");
    if (Filters.length > 0) {
        for (var j = 0; j < Filters.length; j++) {
            SelectedFilters += Filters[j].innerHTML + " ";
        }
        SelectedFilters = SelectedFilters.substring(0, SelectedFilters.length - 1);
        SelectedFilters.replace("/ +/", " ");
    }
    return SelectedFilters;
}