var Event = Backbone.Model.extend({
		initialize: function()
		{
			console.log("Event Initialized");
		},
		url : function()
		{
			return BASEURL+'/meetup/event/' + this.get('id');
		},
		parse: function(response) {
			return response.event;
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
		return BASEURL+'/meetup/user/' + this.id + '/events/';
	},
	parse: function(response) {
		return response.events;
	}
});