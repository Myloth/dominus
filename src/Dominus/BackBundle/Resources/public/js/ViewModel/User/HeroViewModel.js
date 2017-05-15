function listHero(id, name, level, className, roleName, thumbnail) {
    var self = this;

    self.id = id;
    self.name = name;
    self.level = level;
    self.className = className;
    self.roleName = roleName;
    self.thumbnail = thumbnail;
}

function heroDetail() {
    var self = this;
}


function HeroViewModel()
{
    var self = this;

    self.heroes = ko.observableArray([]);
    self.currentHero = ko.observable();

    self.selectHero = function (data) {
        heroId = data.getAttribute('data-hero-id');

        $.ajax({
            url: Routing.generate('hero_detail', {'heroId': heroId}),
            type: 'GET',
            success: function(data) {
                hero = new HeroDetail();

                self.currentHero(hero);
            }

        })
    }
}

ko.applyBindings(new HeroViewModel(), $('#heroTab')[0]);