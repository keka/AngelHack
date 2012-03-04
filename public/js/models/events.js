var Event = Backbone.Model.extend({
		initialize: function()
		{
			console.log("Event Initialized");
		},
		url : function()
		{
			return '/meetup/event/' + this.get('id');
		}
	});

 var EventCollection = Backbone.Collection.extend({
	model: Event,
	initialize: function()
	{
		console.log("EventCollection Initialized");
	},
	url : function()
	{
		return 'meetup/user/' + this.id + '/events/';
	},
	parse: function(response) {
		return response.events;
	}
});