var Rsvp = Backbone.Model.extend({
		initialize: function()
		{
			console.log("Event Initialized");
		},
		url : function()
		{
			return BASEURL+'/meetup/event/' + this.get('id');
		}
	});

 var RsvpCollection = Backbone.Collection.extend({
	model: Rsvp,
	initialize: function()
	{
		console.log("RsvpCollection Initialized");
	},
	url : function()
	{
		return BASEURL+'/meetup/event/' + this.id + '/rsvps';
	}
	/*,
	parse: function(response) {
		return response.events;
	}*/
});